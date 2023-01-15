@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">

        <p class="h1" style="text-align: center; margin:10px;">users</p>
        <table>
            <thead>
                <tr>
                    <th> ID</th>
                    <th>Avatar</th>
                    <th> Name</th>
                    <th>Date of Birth</th>
                    <th> Email </th>
                    <th>Role</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td> {{ $user->id }} </td>
                        <td> <img src="{{ Storage::url('users/'.$user->image) }}" alt="{{ $user->name }}">
                        </td>
                        <td> {{ $user->name }} </td>
                        <td>{{ $user->birthday }}</td>
                        <td> {{ $user->email }} </td>
                        <th> {{ $user->role }}</th>
                        <th> <input class="btn btn-primary"type="submit" value="Make admin">
                        </th>
                        <th> <input class="btn btn-danger"type="submit" value="Remove">
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
