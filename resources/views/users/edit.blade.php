@extends('layouts.app')
@section('page-title', 'Edit-User')
@section('content')
    <div class="row mb-2">
        <div class="col-md-6 d-flex justify-content-start">
            <h2>Edit User</h2>
        </div>
        <div class="col-md-6 d-flex  justify-content-end">
            <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="card p-3">
        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>
                    {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Password:</strong>
                    {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Confirm Password:</strong>
                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Role:</strong>
                    {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}
    </div>

@endsection
