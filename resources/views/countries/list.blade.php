@extends('layouts.main')
@section('content')
<div class="container">
	<h3 class="col-md-12">Countries</h3>
	<div class="d-flex justify-content-center justify-content-between">
		<div class="col-md-8">	
			<div class="card">
				<div class="card-body p-0">
					<form method="get" action="{{ route('countries.index') }}">
						<div class="form-group d-flex justify-content-between">
						<input type="text" name="search" placeholder="Search Country By Name and Code" class="form-control form-control-sm">
						<button type="submit" class="btn-sm btn btn-primary">Search</button>
						<a type="button" href="{{ route('countries.index') }}" class="btn-sm btn btn-info">Reset</a>
						</div> 
					</form>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Country_Code</th>
								<th scope="col">Name</th>
								<th scope="col">Manage</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($countries as $country)
							<tr>
								<th scope="row">{{$loop->iteration}}</th>
								<td>{{$country->country_code}}</td>
								<td>{{$country->name}}</td>
								<td>
									<a href="{{ route('countries.edit',$country->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-pen"></i></a>
									<a href="{{ route('countries.destroy',$country->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					{{$countries->links()}}
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<form method="POST" action="{{ route('countries.store') }}">
				@csrf
				<div class="form-group">
					<label for="name">Country Name</label>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
					@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror   
				</div>            
				<div class="form-group">
					<label for="country_code">Country Code</label>
					<input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code') }}" required autocomplete="country_code" autofocus>
					@error('country_code')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror   
				</div>  
				<button type="submit" class="btn btn-success btn-sm">Add Country</button>      
			</form>
		</div>
	</div>
</div>

@endsection