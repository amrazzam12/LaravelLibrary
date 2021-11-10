@extends('layouts.app')

@section('content')


    <h1 class="text-center mb-5 mt-5">Add Book</h1>
    <div class="container">
        <form action="{{url('books')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">Book Name</label>
                </div>
                <div class="col-10">
                    <input value="{{old('name')}}" type="text" name="name" id="username" required="required" class="form-control" autocomplete="off" placeholder="Book Name" value="{{old('name')}}">
                </div>
            </div>
            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="inputPassword" class="col-form-label">Author</label>
                </div>
                <div class="col-10">
                    <input value="{{old('author')}}" type="text" name="author" id="inputPassword" class="form-control text" placeholder="Author Name">

                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="email" class="col-form-label">Information</label>
                </div>
                <div class="col-10">
                    <input value="{{old('info')}}" type="text" name="info" id="email" required="required" class="form-control text" autocomplete="off" placeholder="More Details">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="username" class="col-form-label">Category</label>
                </div>
                <div class="col-10">
                    <select name="category" class="form-control text">
                        @foreach($categories as $category)
                            <option  value="{{$category['id']}}">{{$category['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="email" class="col-form-label">Photo</label>
                </div>
                <div class="col-10">
                    <input value="{{old('image')}}" type="file" name="image" id="email" required="required" class="form-control text" autocomplete="off">
                </div>
            </div>

            <div class="row mx-5 mb-4">
                <div class="col-2">
                    <label for="pdf" class="col-form-label">Book File</label>
                </div>
                <div class="col-10">
                    <input value="{{old('bookpdf')}}" type="file" name="bookpdf" id="pdf" required="required" class="form-control text" autocomplete="off">
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-5">
                    <button type="submit" class="btn btn-primary btn-lg  mx-5" style="width:100%">Add</button>
                </div>
            </div>

            @forelse($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>

            @empty

            @endforelse
        </form>
    </div>





@endsection
