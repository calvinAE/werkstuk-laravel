@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <h1 class="fs-2 m-4" style="text-align: center">Feqruently Asked Questions (FAQ)</h1>
        <div class="col-8">
            @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif
            @auth
                @if (Auth::user()->role == 'admin')
                    <button type="button" onclick="location.href='{{ url('/faq/create') }}'" class="btn btn-success m-1 float-end">Add
                        Question</button>
                @endif
            @endauth

                <form method="GET">
                <select name="category">
                   @foreach ($allFAQ as $faqItem)
                        <option value="{{ $faqItem->category }}">{{ $faqItem->category }}</option>
                    @endforeach
                </select>
                <input type="submit" class="btn btn-primary" value="Filter">
                </form>
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
                                <form action="{{route('delete', $faqItem->id)}}" method="POST" style="display: inline" class="">
                                @csrf

                               <input class="btn btn-danger float-end"type="submit" value="Remove">

                               </form>
                            @endif
                        @endauth
                        <small>Category: {{ $faqItem->category }}</small>

                    </div>

                </div>
            </div>
        @endforeach
    </div>
   </div>
@endsection
