@extends('dashboard.category_layout')
@section('titulo', 'Crear Categoría')

@section('contenido')

    <h1>Crear Categoría</h1>
    @include('partials._error_form')
    <form action="{{ route('category.store') }}" method="post">
        @include('partials._form_c')
    </form>
@endsection