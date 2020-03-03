@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Users</h1>
            @role('admin')
            <a style="margin: 19px;" href="{{ route('users.create')}}" class="btn btn-primary">New user</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}} (<a href="/users/{{$user->id}}/edit" target="_blank">edit</a>)</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <h2>access denied</h2>
            @endrole

@endsection
