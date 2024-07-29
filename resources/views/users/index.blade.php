@extends('layouts.app')
@section('page-title', 'Users')
@section('content')
    <div class="row mb-2">
        <div class="col-md-6 d-flex justify-content-start">
            <h2>Users Management</h2>
        </div>
        <div class="col-md-6 d-flex  justify-content-end">
            @can('user-create')
                <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fa fa-plus" aria-hidden="true"></i></a>
            @endcan
        </div>
    </div>

    <x-alert-pop-up />

    <div class="card">
        <table class="table table-bordered m-0">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Roles</th>
                @canany(['user-list', 'user-edit', 'user-delete'])
                    <th width="280px">Action</th>
                @endcanany
            </tr>
            @foreach ($data as $key => $user)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if (!empty($user->getRoleNames()))
                            @foreach ($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </td>
                    @canany(['user-list', 'user-edit', 'user-delete'])
                        <td>
                            @can('user-list')
                                <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a>
                            @endcan
                            @can('user-edit')
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>
                            @endcan
                            @can('user-delete')
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            @endcan
                        </td>
                    @endcanany
                </tr>
            @endforeach
        </table>
        <hr>
        <div class="row">
            <div class="col-md-5 d-flex justify-content-start mt-3 ml-3">
                Viewing {{ $data->firstItem() }} - {{ $data->lastItem() }} of {{ $data->total() }} entries
            </div>
            <div class="col-md-6 d-flex justify-content-end mt-3">
                {!! $data->render() !!}
            </div>
        </div>
    </div>
@endsection
