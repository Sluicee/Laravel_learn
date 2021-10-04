@extends('layouts.app')

@section('title-block')Contact @endsection

@section('content')
<h1>Contact page</h1>

<form action="{{ route('contact-form') }}" method="post">
    @csrf

    <input name="user_id"id="user_id" style="display: none" value="{{ Auth::user()->id }}">

    <div class="form-group mt-3">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" id="name" class="form-control" value="{{ Auth::user()->name }}">
    </div>

    <div class="form-group mt-3">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" id="email" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="subject">Subject</label>
        <input type="text" name="subject" placeholder="Subject" id="subject" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="message">Message</label>
        <textarea type="text" name="message" placeholder="Message" id="message" class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-success mt-3">Submit</button>
</form>
@endsection