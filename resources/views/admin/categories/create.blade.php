@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Add Category</h1>
@stop

@section('content')

    <h1 class="text-center mb-5 mt-5">Add Category</h1>
    <div class="container">
        <form action="{{url('admin/categories')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">Name</label>
                </div>
                <div class="col-10">
                    <input type="text" name="name" id="username" required="required" class="form-control" autocomplete="off" placeholder="Username" value="{{old('name')}}">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Add</button>
                </div>
            </div>

        </form><br>
        @forelse($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
            @empty


        @endforelse
    </div>

@stop
