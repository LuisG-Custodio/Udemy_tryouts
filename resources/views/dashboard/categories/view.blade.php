@extends('dashboard.category_layout')
@section('titulo', 'Ver Categoría')

@section('contenido')

    <h1>{{$category->title}}</h1>
    <table>
        <thead>
            <tr>
                <th>
                    Título
                </th>
                <th>
                    Slug
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{$category->title}}
                </td>
                <td>
                    {{$category->slug}}
                </td>
            </tr>
        </tbody>
    </table>
@endsection