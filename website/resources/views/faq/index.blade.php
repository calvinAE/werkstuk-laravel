@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <h1 class="fs-2 m-4" style="text-align: center">Feqruently Asked Questions (FAQ)</h1>
        <div class="col-8">
            @auth
                @if (Auth::user()->role == 'admin')
                    <button type="button" onclick="location.href='{{ url('/faq/create') }}'" class="btn btn-success m-1">Add
                        Question</button>
                @endif
            @endauth

            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle m-1" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Category
                </button>
                <ul class="dropdown-menu">
                    @foreach ($faq as $faqItem)
                        <li><a class="dropdown-item" href="#"> {{ $faqItem->category }}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>

        @foreach ($faq as $faqItem)
            <div class="col-7">
                <div class="card mx-auto text-left" style="margin-bottom: 20px;">
                    <div class="card-body">
                        <h4 class="card-title fw-bold">{{ $faqItem->question }}</h4>
                        <p class="card-text">
                            {{ $faqItem->answer }}</p>
                        @auth
                            @if (Auth::user()->role == 'admin')
                                <button type="button" class="btn btn-danger float-end">Delete</button>
                            @endif
                        @endauth
                        <small>Category: {{ $faqItem->category }}</small>

                    </div>

                </div>
            </div>
        @endforeach
    </div>
@endsection
