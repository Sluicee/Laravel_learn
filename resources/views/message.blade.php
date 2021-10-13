@extends('layouts.app')

@section('title-block'){{ $data->subject }} @endsection

@section('content')
<h1>{{ $data->subject }}</h1>
<div class="alert alert-info">
    <p>{{ $data->name }}</p>
    <p>{{ $data->email }}</p>
    <p>{{ $data->messages }}</p>
    <p><small>{{ $data->created_at }}</small></p>
    <a href="{{ route('contact-update', $data->id) }}"><button class="btn btn-primary">Edit</button></a>
    @can('edit-messages')
        <a href="{{ route('contact-delete', $data->id) }}"><button class="btn btn-danger">Delete</button></a>
    @endcan
</div>
@endsection
