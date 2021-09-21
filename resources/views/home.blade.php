@extends('layouts.app')

@section('title-block')Home @endsection

@section('content')
<h1>Home page</h1>
<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis, accusantium. Voluptas, optio sequi culpa quo laborum hic temporibus, omnis ipsum enim nulla unde non harum, illo iure vitae velit facere.</p>
@endsection

@section('aside')@parent<p>Home side text</p>
@endsection