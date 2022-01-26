@extends('layouts.app')

@section('title-block')Messages @endsection

@section('content')
<h1>Types</h1>
<form action="{{ route('applicationType-add') }}" method="post">
    @csrf

    <div class="form-group mt-3">
        <label for="typeName">Name</label>
        <input type="text" name="typeName" placeholder="Type Name" id="typeName" class="form-control">
    </div>

    <button type="submit" class="btn btn-success mt-3">Add</button>
</form>

<form action="{{ route('applicationType-delete') }}" method="post">
    @csrf

    <select class="form-select mt-3" name="appType_select">
        @foreach($app_data_type as $type)
        <option value="{{ $type->id }}">
            {{ $type->name }}
        </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-danger mt-3">Delete</button>
</form>

<h1>Messages</h1>
@foreach($data as $elmnt)
<div class="alert alert-info">
    <h3>{{ $elmnt->subject }}</h3>
    <h3>Status: {{ $elmnt->status }}</h3>
    <h3>Type: {{ $elmnt->app_type }}</h3>
    <p>{{ $elmnt->email }}</p>
    <p><small>{{ $elmnt->created_at }}</small></p>
    <a href="{{ route('contact-message', $elmnt->id) }}"><button class="btn btn-success">More...</button></a>
</div>
@endforeach
@endsection
