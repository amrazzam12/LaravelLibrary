@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Edit Book</h1>
@stop

@section('content')
    <h1 class="text-center mb-5 mt-5">Edit Book</h1>
    <div class="container">

        <form action="{{url('admin/books/' . $book['id'] ) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="userid" value="{{$book['id']}}">
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">Name</label>
                </div>
                <div class="col-10">
                    <input type="text" name="name" id="username" required="required" class="form-control" autocomplete="off" value="{{$book['name']}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="Author" class="col-form-label">Author</label>
                </div>
                <div class="col-10">
                    <input type="text" name="author" id="Author" required="required" class="form-control" autocomplete="off" value="{{$book['author']}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="Info" class="col-form-label">Info</label>
                </div>
                <div class="col-10">
                    <input type="text" name="info" id="Info" required="required" class="form-control" autocomplete="off" value="{{$book['info']}}">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="Category" class="col-form-label">Category</label>
                </div>
                <div class="col-10">
                    <select name="category" class="form-control text" id="Category">
                        @foreach($categories as $category)
                            <option
                                @if($book->category->name == $category->name )
                                       selected = 'selected'
                                @endif
                                value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Save</button>
                </div>
            </div>
            <br>
            @forelse($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @empty
            @endforelse
        </form>
    </div>

@stop
