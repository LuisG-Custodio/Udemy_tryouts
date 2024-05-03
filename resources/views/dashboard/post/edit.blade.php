@extends('dashboard.post_layout')
@section('titulo', 'Editar Post')

@section('contenido')

    <h1>Editar Post {{$post->title}}</h1>
    @include('partials._error_form')
    <form action="{{ route('post.update',$post->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @include('partials._form',["task"=>"edit"])
    </form>
@endsection