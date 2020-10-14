<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $Post = new Post;
        $Post->user_id = $request->input('user_id');
        $Post->titulo = $request->input('titulo');
        $Post->contenido = $request->input('contenido');

        $Post->save();

        return response()->json($Post, 201);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Post
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $Post = Post::find($id);
        $Post->user_id = $request->input('user_id');
        $Post->titulo = $request->input('titulo');
        $Post->contenido = $request->input('contenido');

        $Post->save();

        return response()->json($request, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $estado;
        $sql=\App\Post::where('id','=',$id);

        if(Post::find($id)){
            $sql ->delete();
            $estado=200;
        }else{
            $estado=400;
        }
        
        return response()->json(null, $estado);
    }
}
