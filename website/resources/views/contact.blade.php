@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
                <form class="mt-3" method="post" action="{{ route('send-email') }}">
                    @csrf
                    <h2 class="text-center mb-4">Contact Us</h2>
                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                     @endif
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="email">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
