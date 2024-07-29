
@extends('layouts.app')
@section('page-title', 'Blog')
@section('content')
<style>

</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<div class="row mb-2">
    <div class="col-md-6 d-flex justify-content-start">
        <h2>Blog</h2>
    </div>
</div>

<form action="{{ route('blog.upload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
      <div class="col">
        <input type="file" name="image" accept="image/*" class="form-control" >
      </div>
      <div class="col">
        <input type="text" name="title" class="form-control" placeholder="Enter Title" />
      </div>
      <div class="col">
        <textarea id="w3review" name="description" rows="3" cols="50"></textarea>
      </div>
      <div class="col">

    <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
  </form>
  <br>
<x-alert-pop-up />

<div class="card p-2 table-responsive">
    <table class="table table-bordered m-0 " id="dtBasicExample">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($blog as $logo)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $logo->title }}</td>
                        <td>
                            @if(isset($logo->image))
                            <img src="{{ asset('storage/logos/' . $logo->image) }}" alt="Logo" class="img-fluid" width="100px" style="height: 100px;">
                           @endif
                        </td>
                        <td>
                            <form action="{{ route('blog.delete', $logo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

