
@extends('layouts.app')
@section('page-title', 'Conatct Us')
@section('content')
<style>

</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<div class="row mb-2">
    <div class="col-md-6 d-flex justify-content-start">
        <h2>Contact Us</h2>
    </div>
</div>

<x-alert-pop-up />

<div class="card p-2 table-responsive">
    <table class="table table-bordered m-0 " id="dtBasicExample">
            <thead>
                <tr>
                    <th>No</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Company</th>
                    <th>Website</th>
                    <th>Description</th>
                    <th>Service</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($contact as $logo)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $logo->first_name }}</td>
                        <td>{{ $logo->last_name }}</td>
                        <td>{{ $logo->email }}</td>
                        <td>{{ $logo->phone_number }}</td>
                        <td>{{ $logo->company }}</td>
                        <td>{{ $logo->website }}</td>
                        <td>{{ $logo->description }}</td>
                        <td>{{ $logo->service }}</td>
                        <td>
                            <form action="{{ route('contact.delete', $logo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this contact?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

