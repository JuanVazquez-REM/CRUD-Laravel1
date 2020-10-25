<?php

namespace App\Http\Controllers;

use DB;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;

//Nota
//Al usar DB no es la mas correcta si ya contamos con las relaciones de Eloquent

class PostController extends Controller
{
    public function index(Request $request){
        $sql = Post::all();

        //dd($sql); //generar un log, con lo que esta sucediento del lado del servidor,Esto funciona como un die.

        Log::debug('Verificando la funcion index',["request" => $request, "sql" => $sql]); //podemos clasificar los de log 
    }

    public function posts(){
        $posts = Post::select()->get(); //solicito toda la tabla post de mi BD
        return response()->json($posts, 200); //la guardo en una variable, donde despues rotorno el tabla 
    }

    public function post_id($id){ 
        $posts = Post::table()->where('id','=',$id)->get(); //busco en mi tabla post un $id que sea igual a id, y despues me recojo todos los datos correpondientes a es id
        return response()->json($posts, 200); //Retorno request y un codigo de estado
    }

    public function insertar(Request $request){
        $request_post = new Post; //Intancio el objeto post

        $request_post->user_id = $request->input('user_id'); //Guardo cada uno de los parametros y le asigno un lugar
        $request_post->titulo = $request->input('titulo');
        $request_post->contenido = $request->input('contenido');

        $request_post->save();  //despues los guardo en mi BD

        return response()->json($request,201); //retorno el request, junto con un codigo de estado
    }

    public function actualizar(Request $request,$id){
        
        $user_id = $request->input('user_id'); //Guardo cada uno de los parametros y le asigno un lugar
        $titulo = $request->input('titulo');
        $contenido = $request->input('contenido');

        Post::where('id', $id)->update(['user_id'=>$user_id,'titulo'=>$titulo, 'contenido'=> $contenido]);
        return response()->json($request,200);
    }

    public function borrar_post($id){
            $post = Post::where('id','=',$id); //se busca el post correspondieteal id
            $post->delete(); //Se borrar el post
            
        return response()->json();   //Se manda un codigo de estado
    }

    public function posts_comments(){
        $post = post::with('comment')->get(); //Mostrar la tabla posts con la tabla comment, tomando en cuenta la relacion de estas mismas  
        
        return response()->json($post,200);
    }
}
