@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1>Users</h1>
@stop

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Operation</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$users[0]->id}}</th>
            <td>{{$users[0]->name}}</td>
            <td>{{$users[0]->email}}</td>
            <td><button class="btn btn-md btn-primary">ADMIN</button></td>
        </tr>

        @foreach($users as $user)
            @if($loop->iteration == 1)
                @continue
            @endif
        <tr>
            <th scope="row">{{$user['id']}}</th>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>
                <div>
                    <x-op-btns
                        :section="'users'"
                        :id="$user['id']">
                    </x-op-btns>
                </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <x-add-btn :sec="'User'" :section="'users'" />
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
