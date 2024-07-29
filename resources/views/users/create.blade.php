@extends('layouts.app')
@section('page-title', 'Add-User')
@section('content')
    <div class="row mb-2">
        <div class="col-md-6 d-flex justify-content-start">
            <h2>Create New User</h2>
        </div>
        <div class="col-md-6 d-flex  justify-content-end">
            <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="card p-3">
        {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                    </div>
                    @error('name')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Email:</strong>
                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                    </div>
                    @error('email')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Password:</strong>
                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                    </div>
                    @error('password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Confirm Password:</strong>
                        {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                    </div>
                    @error('confirm-password')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Role:</strong>
                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control Select2']) !!}
                    </div>
                    @error('roles')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
    </div>
@endsection
