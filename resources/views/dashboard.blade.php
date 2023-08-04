@extends('template.main')
@section('title', $title)

@section('content')
    <div class="container text-center pt-3">
        <h2>Selamat Datang {{ auth()->user()->name }}</h2>
    </div>
@endsection
