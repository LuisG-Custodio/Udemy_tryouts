@extends('dashboard.category_layout')
@section('titulo','Index')
@section('contenido')

<a href="{{route('category.create')}}">Crear</a>
<table>
    <thead>
        <tr>
            <th>
                Título
            </th>
            <th>
                Slug
            </th>
            <th>
                Acciones
            </th>
        </tr>
    </thead>
    <tbody>
        @forelse ($categories as $c)
            <tr>
            <td>
                {{$c->title}}
            </td>
            <td>
                {{$c->slug}}
            </td>
            <td>
                <a href="{{route('category.edit',$c->id)}}">Editar</a>
                <a href="{{route('category.show',$c)}}">Ver</a>
                <form action="{{route('category.destroy',$c)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
            <tr>
            No hay datos en esta tabla
            </tr>
        @endforelse
    </tbody>
</table>

{{$categories->links()}}
@endsection
