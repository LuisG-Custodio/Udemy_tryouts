<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //dd(session()->all());
        //dd(Category::find(1)->Posts);
        $posts=Post::paginate(5);
        
        //dd($posts);
        return view('dashboard.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$categories=Category::get();
        $categories=Category::pluck('id','title');
        $post = new Post();
        //dd($categories);
        return view('dashboard.post.create',compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //validador en funcion
        /* $validate=$request->validate([
            "title"=>"required|min:5|max:250",
            "slug"=>"required|min:5|max:250",
            "category_id"=>"required",
            "content"=>"required|min:5",
            "description"=>"required",
            "posted"=>"required"
        //]); */
        //dd($request->all());
        //dd($validate);
        //echo request('title');
        //echo $request->input('slug');
        

        //visualizar validadores
        //$validate=Validator::make($request->all(), $request->rules());
        //dd($validate);

        //limpieza de slug
        //$data=$request->all();
        //$data['slug']=Str::slug($data['title']);
        //dd($data);

            

        Post::create($request->all());
        return to_route("post.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories=Category::pluck('id','title');
        return view('dashboard.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Post $post)
    {

        $data=$request->validated();
        if(isset($data["image"])){

            //dd($request->validated()["image"]->hashName());
            //dd($post->title);
            $data["image"]=$filename=$post->slug.'.'.$data["image"]->extension();
            //dd($filename);
            $request->image->move(public_path("image"),$filename);
        }
        $post->update($data);
        //$request->session()->flash('status',"Registro actualizado");
        return to_route("post.index")->with('status',"Registro actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
