@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <h1 class="fs-2 m-4" style="text-align: center">News overview</h1>

        <div class="col-10">
            <button type="button" style="margin-bottom: 10px; float: right;"
                onclick="location.href='{{ url('/news/create') }}'" class="btn btn-success float-right">New
                Post</button>
        </div>

        @foreach ($news as $newsItem)
            <div class="col-md-5">
                <div class="card text-left  mx-auto d-flex"
                    style="min-width:260px; margin-bottom:40px; max-width:500px; min-height:300px; box-shadow: rgba(0, 0, 0, 0.15) 0px 15px 25px, rgba(0, 0, 0, 0.05) 0px 5px 10px;">
                    <a href="{{ route('news.show', $newsItem->id) }}" class="card-body">
                        <h1 class="card-title" style="font-size: 30px; font-weight:bold; ">{{ $newsItem->title }}</h1>
                        <img src="{{ 'data:image/png;base64,' . base64_encode($newsItem->cover_img) }}" alt="cover image">
                        <p class="card-text">{{ $newsItem->content }}</p>
                        <small>{{ 'Author: ' . $newsItem->user->name }}
                        </small><br>
                        <small> {{ date('l, d M Y', strtotime($newsItem->publishing_date)) }}</small>

                        <br>

                    </a>

                </div>
            </div>
        @endforeach
    </div>
@endsection
