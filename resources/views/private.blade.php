@extends('layouts.app')

@section('title-block')Home @endsection

@section('content')
<h1>Cabinet</h1>
<p>Hello {{ Auth::user()->name }}. it's secret page</p>
@endsection

@section('aside')@parent<p>Home side text</p>
@endsection