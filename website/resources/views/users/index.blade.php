@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">

        <p class="h1" style="text-align: center; margin:10px;">users</p>
            @if (session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif
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
                        <td> <img style="width:35px;" src="{{ Storage::url('users/'.$user->avatar) }}" alt="{{ $user->name }}">
                        </td>
                        <td> {{ $user->name }} </td>
                        <td>{{ $user->birthday }}</td>
                        <td> {{ $user->email }} </td>
                        <th> {{ $user->role }}</th>
                        <th><form action="{{route('makeAdmin', $user->id)}}" method="POST" style="display: inline" class="">
                                @csrf
                                <div class="ml-5">
                                <input class="btn btn-primary"type="submit" value="Make admin">
                                </div>
                               </form>
                        </th>
                        <th> <form action="{{route('removeUser', $user->id)}}" method="POST" style="display: inline" class="">
                                @csrf
                                <div class="ml-5">
                               <input class="btn btn-danger"type="submit" value="Remove">
                                </div>
                               </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
