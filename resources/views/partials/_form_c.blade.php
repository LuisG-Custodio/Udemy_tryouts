@csrf

<label for="title">Titulo</label>
<input type="text" name="title" value="{{old("title",$category->title)}}">

<button type="submit">Enviar</button>