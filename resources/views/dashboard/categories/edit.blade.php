@extends('dashboard.category_layout')
@section('titulo', 'Editar Categoría')

@section('contenido')

    <h1>Editar Categoría {{$category->title}}</h1>
    @include('partials._error_form')
    <form action="{{ route('category.update',$category->id) }}" method="post">
        @method('PUT')
        @include('partials._form_c')
    </form>
@endsection