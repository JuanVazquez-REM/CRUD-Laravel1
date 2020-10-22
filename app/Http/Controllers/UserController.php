<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user(){
        $users = User::select()->get(); 
        return response()->json($users, 200); 
    }

    public function user_id($id){ 
        $users = User::select()->where('id',$id)->get(); 

        return response()->json($users, 200);
    }

    public function insertar(Request $request){
        $request_user = new User; 

        $request_user->name = $request->input('name'); 
        $request_user->email = $request->input('email');
        $request_user->password = "$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi";

        $request_user->save();  

        return response()->json($request,201); 
    }

    public function actualizar(Request $request,$id){

        $name = $request->input('name'); 
        $email = $request->input('email');
        $password = $request->input('password');
        

        User::where('id', $id)->update(['name'=>$name,'email'=> $email ,'password'=> $password]);
        return response()->json($request,200);
    }

    public function borrar_user($id){
            $user = User::where('id','=',$id); 
            $user->delete(); 
            
        return response()->json();   
    }

    public function posts_user_id($id){
        //Mostrar los comentarios de un determinado posts
        $posts = DB::table('users')
        ->join('posts', 'users.id', '=' ,'posts.user_id')
        ->where('users.id', '=' , $id)
        ->select('posts.*')
        ->get();


        return response() ->json($posts,200);
    }

    public function users_posts(){
        $posts = User::with('post')->get(); //Mostrar la tabla users con sus respestivos posts asociados, en formato json  

        return response()->json($posts,200);
    }



}

