<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $Comment = new Comment;
        $Comment->Comment_id = $request->input('Comment_id');
        $Comment->nombre = $request->input('nombre');
        $Comment->email = $request->input('email');
        $Comment->contenido = $request->input('contenido');

        $Comment->save();

        return response()->json($Comment, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        return Comment::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Comment = Comment::find($id);
        $Comment->post_id = $request->input('post_id');
        $Comment->nombre = $request->input('nombre');
        $Comment->email = $request->input('email');
        $Comment->contenido = $request->input('contenido');

        $Comment->save();

        return response()->json($request, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $estado;
        $sql=\App\Comment::where('id','=',$id);

        if(Comment::find($id)){
            $sql ->delete();
            $estado=200;
        }else{
            $estado=400;
        }
        
        return response()->json(null, $estado);
    }
}
