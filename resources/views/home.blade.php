@extends('layouts.app')

@section('page-title','Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Total Client') }}</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="client">Client</label>
                            <input type="text" class="form-control" id="client" name="client" @if(isset($settingData->client)) value="{{$settingData->client}}" @endif>
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
