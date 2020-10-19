<?php

namespace App\Http\Controllers;

use DB;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comments(){
        $comments = DB::table('comments')->get(); 
        return response()->json($comments, 200); 
    }

    public function comment_id($id){ 
        $comments = DB::table('comments')->where('id',$id)->get(); 

        return response()->json($comments, 200);
    }

    public function insertar(Request $request){
        $request_comment = new Comment; 

        $request_comment->post_id = $request->input('post_id'); 
        $request_comment->nombre = $request->input('nombre');
        $request_comment->email = $request->input('email');
        $request_comment->contenido = $request->input('contenido');

        $request_comment->save();  

        return response()->json($request,201); 
    }

    public function actualizar(Request $request,$id){

        $post_id = $request->input('post_id'); 
        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $contenido = $request->input('contenido');

        Comment::where('id', $id)->update(['post_id'=>$post_id,'nombre'=>$nombre,'email'=> $email ,'contenido'=> $contenido]);
        return response()->json($request,200);
    }

    public function borrar_comment($id){
            $comment = Comment::where('id','=',$id); 
            $comment->delete(); 
            
        return response()->json();   
    }

    

    public function comments_posts_id($id){
        //Mostrar los comentarios de un determinado posts
        $comments = DB::table('comments')
        ->join('posts', 'posts.id', '=' , 'comments.post_id')
        ->where('posts.id', '=' , $id)
        ->select('comments.*')
        ->get();


        return response() ->json($comments,200);
    }
}
