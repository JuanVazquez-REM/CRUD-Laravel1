<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $User = new User;
        $User->name = $request->input('name');
        $User->email = $request->input('email');

        $User->save();

        return response()->json($User, 201);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\User
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $User = User::find($id);
        $User->name = $request->input('name');
        $User->email = $request->input('email');

        $User->save();

        return response()->json($request, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $estado;
        $sql=\App\User::where('id','=',$id);

        if(User::find($id)){
            $sql ->delete();
            $estado=200;
        }else{
            $estado=400;
        }
        
        return response()->json(null, $estado);
    }
}

