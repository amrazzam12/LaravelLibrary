@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Categories</h1>
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Operation</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category['id']}}</th>
                <td>{{$category['name']}}</td>
                <td>
                    <div>
                        <x-op-btns
                            :section="'categories'"
                            :id="$category['id']">
                        </x-op-btns>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <x-add-btn :sec="'Category'" :section="'categories'"/>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
