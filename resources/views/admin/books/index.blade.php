@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Books</h1>
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Author</th>
            <th scope="col">Info</th>
            <th scope="col">Image</th>
            <th scope="col">Publisher</th>
            <th scope="col">Category</th>
            <th scope="col">Operation</th>
        </tr>
        </thead>
        <tbody>

        @foreach($books as $book)

            <tr>
                <th scope="row">{{$book['id']}}</th>
                <td>{{$book['name']}}</td>
                <td>{{$book['author']}}</td>
                <td>{{$book['info']}}</td>
                <td>{{$book['image']}}</td>
                <td>{{$book->publisher->name}}</td>
                <td>{{$book->category->name}}</td>
                <td>
                    <div>
                        <x-op-btns
                            :section="'books'"
                            :id="$book['id']">
                        </x-op-btns>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
