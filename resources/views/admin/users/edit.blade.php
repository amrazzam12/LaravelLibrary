@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Edit User</h1>
@stop

@section('content')
<h1 class="text-center mb-5 mt-5">Edit Member</h1>
<div class="container">

    <form action="{{url('admin/users/' . $user['id'] ) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <input type="hidden" name="userid" value="{{$user['id']}}">
        <div class="row mx-5 mb-4">
            <div class="col-2">
                <label for="username" class="col-form-label">Username</label>
            </div>
            <div class="col-10">
                <input type="text" name="name" id="username" required="required" class="form-control" autocomplete="off" value="{{$user['name']}}">
            </div>
        </div>

        <div class="row mx-5 mb-4">
            <div class="col-2">
                <label for="email" class="col-form-label">Email</label>
            </div>
            <div class="col-10">
                <input type="email" name="email" id="email" required="required" class="form-control text" autocomplete="off" value="{{$user['email']}}">
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-5">
                <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Save</button>
            </div>
        </div>
<br>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
    </form>
</div>

@stop
