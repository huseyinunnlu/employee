@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Edit {{$country->name}} Named Country <a href="{{ route('countries.index') }}" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-arrow-left"></i> Go Back</a></h3>
            <form method="POST" action="{{ route('countries.update',$country->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Country Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $country->name }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   
                </div>            
                <div class="form-group">
                    <label for="country_code">Country Code</label>
                    <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror" name="country_code" value="{{ $country->country_code }}" required autocomplete="country_code" autofocus>
                    @error('country_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   
                </div>  
                <button type="submit" class="btn btn-success btn-sm">Update Country</button>      
            </form>
        </div>
    </div>
</div>
@endsection
