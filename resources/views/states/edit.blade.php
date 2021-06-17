@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Edit {{$state->name}} Named State <a href="{{ route('states.index') }}" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-arrow-left"></i> Go Back</a></h3>
            <form method="POST" action="{{ route('states.update',$state->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">State Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $state->name }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror   
                </div>            
                <div class="form-group">
                    <label for="country_id">Country Id</label>
                    <select id="country_id" name="country_id" class="form-control">
                        @foreach ($countries as $country)
                            <option @if($state->country_id == $country->id) selected="" @endif value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>  
                <button type="submit" class="btn btn-success btn-sm">Edit State</button>            
            </form>
        </div>
    </div>
</div>
@endsection
