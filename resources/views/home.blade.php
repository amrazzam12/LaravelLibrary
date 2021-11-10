@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 row">
            @forelse($books as $book)
            <div style="margin-bottom: 40px" class="book col-4" style="height: 400px">
                <div class="card">
                    <img style="height:350px;width: 100%" class="card-img-top" src="{{asset('storage/books/' . $book['image'])}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$book['name']}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span style="color: red; font-weight:bold">Author</span> : {{$book['author']}}</li>
                        <li class="list-group-item"><span style="color: blue; font-weight:bold">Category</span> : <a href="">{{$book->category->name}}</a></li>
                        <li class="list-group-item"><span style="color: green; font-weight:bold">Publisher</span> : {{ucwords($book->publisher->name)}}</li>
                    </ul>
                    <div class="card-body">
                        <a href="{{url('books/' . $book['id'])}}" class="card-link"><button class="btn btn-lg btn-primary">Details</button></a>
                    </div>
                </div>
            </div>
            @empty
                <h2>No Books</h2>
            @endforelse
        </div>
        <div class="col-2">
            <h3>Categories</h3>
            <ul style="list-style: none">
                @foreach($categories as $category)
                    <li><h4><a href="{{url('categories/' . $category['name'])}}">{{$category['name']}}</a> </h4></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
