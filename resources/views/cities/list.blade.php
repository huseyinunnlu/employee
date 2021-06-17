@extends('layouts.main')
@section('content')
<div class="container">
	<h3 class="col-md-12">Cities</h3>
	<div class="d-flex justify-content-center justify-content-between">
		<div class="col-md-8">	
			<div class="card">
				<div class="card-body p-0">
					<form method="get" action="{{ route('cities.index') }}">
						<div class="form-group d-flex justify-content-between">
						<input type="text" name="search" placeholder="Search Country By Name and Code" class="form-control form-control-sm">
						<button type="submit" class="btn-sm btn btn-primary">Search</button>
						<a type="button" href="{{ route('cities.index') }}" class="btn-sm btn btn-info">Reset</a>
						</div> 
					</form>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">State Id</th>
								<th scope="col">Name</th>
								<th scope="col">Manage</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($cities as $city)
							<tr>
								<th scope="row">{{$loop->iteration}}</th>
								<td>{{$city->state->name}} | {{$city->state->id}}</td>
								<td>{{$city->name}}</td>
								<td>
									<a href="{{ route('cities.edit',$city->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
									<a href="{{ route('cities.destroy',$city->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					 {{$cities->links()}} 
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<form method="POST" action="{{ route('cities.store') }}">
				@csrf
				<div class="form-group">
					<label for="name">City Name</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror   
				</div>            
				<div class="form-group">
					<label for="state_id">State Id</label>
					<select id="state_id" name="state_id" class="form-control">
						@foreach ($states as $state)
							<option value="{{$state->id}}">{{$state->name}}</option>
						@endforeach
					</select>
				</div>  
				<button type="submit" class="btn btn-success btn-sm">Add City</button>      
			</form>
		</div>
	</div>
</div>

@endsection