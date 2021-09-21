@extends('layouts.app')

@section('title-block')Update @endsection

@section('content')
<h1>Update page</h1>

<form action="{{ route('contact-update-submit', $data->id) }}" method="post">
    @csrf

    <div class="form-group mt-3">
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $data->name }}" placeholder="Name" id="name" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="email">Email</label>
        <input type="text" name="email" value="{{ $data->email }}" placeholder="Email" id="email" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="subject">Subject</label>
        <input type="text" name="subject" value="{{ $data->subject }}" placeholder="Subject" id="subject" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="message">Message</label>
        <textarea type="text" name="message" placeholder="Message" id="message" class="form-control">{{ $data->messages }}</textarea>
    </div>

    <button type="submit" class="btn btn-success mt-3">Update</button>
</form>
@endsection