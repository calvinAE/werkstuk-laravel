@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">

                <div class="card-body">

                    <h1 class="card-title" style="font-size: 30px; font-weight:bold; ">{{ $news->title }}</h1>
                    <img src="{{ 'data:image/png;base64,' . base64_encode($news->cover_img) }}" alt="cover image">
                    <p class="card-text">{{ $news->content }}</p>
                    <small>{{ 'Author: ' . $news->user->name }}
                    </small><br>
                    <small> {{ date('l, d M Y', strtotime($news->publishing_date)) }}</small>
                    @auth
                        @if (Auth::user()->role == 'admin')
                            <form method="post" action="{{ route('news.destroy', $news->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="margin: 5px; float: right;" class="btn btn-danger float-right"><i
                                        class="bi bi-trash"></i></button>
                            </form>
                            <button type="submit" style="margin: 5px; float: right;" class="btn btn-success float-right"><i
                                    class="bi bi-pencil"></i></button>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
