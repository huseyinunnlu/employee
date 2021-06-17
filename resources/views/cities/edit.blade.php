@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3>Edit {{$city->name}} Named State <a href="{{ route('cities.index') }}" class="btn btn-primary btn-sm" style="float: right;"><i class="fas fa-arrow-left"></i> Go Back</a></h3>
            <form method="POST" action="{{ route('cities.update',$city->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">State Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $city->name }}" required>
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
                            <option @if($city->state_id == $state->id) selected="" @endif value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </div>  
                <button type="submit" class="btn btn-success btn-sm">Edit State</button>            
            </form>
        </div>
    </div>
</div>
@endsection
