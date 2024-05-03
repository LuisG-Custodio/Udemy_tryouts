@csrf

<label for="title">Titulo</label>
<input type="text" name="title" value="{{old("title",$post->title)}}">

<label for="slug">Slug</label>
<input type="text" name="slug" value="{{old("slug",$post->slug)}}">

<label for="category_id">Categoría</label>
<select name="category_id">
    <option value=""></option>
    {{-- @foreach ($categories as $c)
        <option value="{{ $c->id}}">{{$c->title}}</option>
    @endforeach --}}
    @foreach ($categories as $title=>$id)
        <option {{old("category_id",$post->category_id) == $id ? 'selected': ''}} value="{{$id}}">{{$title}}</option>
    @endforeach
</select>

<label for="posted">Posteado</label>
<select name="posted">
    <option {{old("posted",$post->posted) == 'yes' ? 'selected': ''}} value="yes">Si</option>
    <option {{old("posted",$post->posted) == 'not' ? 'selected': ''}} value="not">No</option>
</select>


<label for="content">Contenido</label>
<textarea name="content">{{old("content",$post->content)}}</textarea>

<label for="description">Descripcion</label>
<textarea name="description">{{old("description",$post->description)}}</textarea>

@if(isset($task) && $task=="edit")
<label for="image">Imagen</label>
<input type="file" name="image">

@endif

<button type="submit">Enviar</button>