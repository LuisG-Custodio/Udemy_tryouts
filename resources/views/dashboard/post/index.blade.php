@extends('dashboard.post_layout')
@section('titulo','Index')
@section('contenido')

    <a href="{{route('post.create')}}">Crear</a>
    <table>
        <thead>
            <tr>
                <th>
                    Título
                </th>
                <th>
                    Categoría
                </th>
                <th>
                    Posteado
                </th>
                <th>
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $p)
                <tr>
                <td>
                    {{$p->title}}
                </td>
                <td>
                    {{$p->category->title}}
                </td>
                <td>
                    {{$p->posted}}
                </td>
                <td>
                    <a href="{{route('post.edit',$p->id)}}">Editar</a>
                    <a href="{{route('post.show',$p)}}">Ver</a>
                    <form action="{{route('post.destroy',$p)}}" method="post">
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

    {{$posts->links()}}
@endsection
