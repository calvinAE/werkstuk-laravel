@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data">
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
                            <label for="title">Title</label>
                            <input type="text" style="" class="form-control" name="title" id="title">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                            <label for="file">Upload news cover</label>
                            <input type="file" name="cover_img" class="form-control-file" id="file">
                            <button type="submit" class="btn btn-primary">
                                Add News
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
