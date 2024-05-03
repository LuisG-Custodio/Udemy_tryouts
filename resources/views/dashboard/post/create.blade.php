@extends('dashboard.post_layout')
@section('titulo', 'Crear Post')

@section('contenido')

    <h1>Crear Post</h1>
    @include('partials._error_form')
    <form action="{{ route('post.store') }}" method="post">
        @include('partials._form')
    </form>
@endsection