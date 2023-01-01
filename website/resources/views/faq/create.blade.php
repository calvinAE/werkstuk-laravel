@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('faq.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card text-left">
                        <div class="card-body">
                            <label for="title">Question</label>
                            <input type="text" name="question" class="form-control" id="question">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" name="category" id="category">
                            <label for="title">Answer</label>
                            <textarea class="form-control" id="answer" name="answer" rows="3"></textarea>
                            <button class="btn btn-primary" style="margin-top: 10px" type="submit">Create Question</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
