@extends('layouts.app')

@section('title-block')Contact @endsection

@section('content')
<h1>Contact page</h1>

<form enctype="multipart/form-data" action="{{ route('contact-form') }}" method="post">
    @csrf

    <input name="user_id"id="user_id" style="display: none" value="{{ Auth::user()->id }}">

    <div class="form-group mt-3" style="display:none">
        <label for="name">Name</label>
        <input type="text" name="name" placeholder="Name" id="name" class="form-control" value="{{ Auth::user()->name }}">
    </div>

    <div class="form-group mt-3" style="display:none">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" id="email" class="form-control" value="{{ Auth::user()->email }}">
    </div>

    <div class="form-group mt-3">
        <label for="subject">Subject</label>
        <input type="text" name="subject" placeholder="Subject" id="subject" class="form-control">
    </div>

    <div class="form-group mt-3">
        <label for="message">Message</label>
        <textarea type="text" name="message" placeholder="Message" id="message" class="form-control"></textarea>
    </div>

    <div class="form-group mt-3">
        <label for="beforeImage">Image</label>
        <input type="file" class="form-control-file" id="beforeImage" name="beforeImage">
    </div>

    <select class="form-select mt-3" name="appType_select">
        @foreach($data as $type)
        <option value="{{ $type->name }}">
            {{ $type->name }}
        </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-success mt-3">Submit</button>
</form>
@endsection