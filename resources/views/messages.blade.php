@extends('layouts.app')

@section('title-block')Messages @endsection

@section('content')
<h1>Messages</h1>
@foreach($data as $elmnt)
<div class="alert alert-info">
    <h3>{{ $elmnt->subject }}</h3>
    <p>{{ $elmnt->email }}</p>
    <p><small>{{ $elmnt->created_at }}</small></p>
    <a href="#"><button class="btn btn-success">More...</button></a>
</div>
@endforeach
@endsection
