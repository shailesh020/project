@extends('layouts.app')
@section('page-title', 'Show-User')
@section('content')
    <div class="row mb-2">
        <div class="col-md-6 d-flex justify-content-start">
            <h2>Show User</h2>
        </div>
        <div class="col-md-6 d-flex  justify-content-end">
            <a class="btn btn-primary" href="{{ route('users.index') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="card p-3">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Roles:</strong>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
