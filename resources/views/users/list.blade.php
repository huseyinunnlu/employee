@extends('layouts.main')
@section('content')
<div class="container">
	<h3 class="col-md-12">Users</h3>
	<div class="d-flex justify-content-center justify-content-between">
		<div class="col-md-8">	
			<div class="card">
				<div class="card-body p-0">
					<form method="get" action="{{ route('users.index') }}">
						<div class="form-group d-flex justify-content-between">
						<input type="text" name="search" placeholder="Search User By Username" class="form-control form-control-sm">
						<button type="submit" class="btn-sm btn btn-primary">Search</button>
						<a href="{{ route('users.index') }}" class="btn btn-info btn-sm">Reset</a>
						</div> 
					</form>

					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Username</th>
								<th scope="col">Email</th>
								<th scope="col">Manage</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
								<th scope="row">{{$loop->iteration}}</th>
								<td>{{$user->username}}</td>
								<td>{{$user->email}}</td>
								<td>
									<a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
									<a href="{{ route('users.destroy',$user->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{$users->links()}}
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<form method="POST" action="{{ route('users.store') }}">
				@csrf
				<div class="form-group">
					<label for="username">Username</label>
					<input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>
					@error('username')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror   
				</div>            
				<div class="form-group">
					<label for="first_name">First Name</label>
					<input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
					@error('first_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror   
				</div>  
				<div class="form-group">
					<label for="last_name">Last Name</label>
					<input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
					@error('last_name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror   
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('last_Name') }}" required autocomplete="email" autofocus>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror   
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="epasswordmail" value="{{ old('last_Name') }}" required>
					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror   
				</div>
				<button type="submit" class="btn btn-success btn-sm">Add User</button>      
			</form>
		</div>
	</div>
</div>

@endsection