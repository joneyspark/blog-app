<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        dd(auth()->guard()->user()->check());
        return view('adminmaster');

        //first check if you are loggedin and admin user ...

        /* if(!Auth::guard('api')->user() && $request->path() != 'login'){
            return redirect('/login');
        }
        if(!Auth::guard('api')->user() && $request->path() == 'login' ){
            return view('adminmaster');
        }
        // you are already logged in... so check for if you are an admin user..
        $user = Auth::guard('api')->user();
        if($user->userType =='user'){
            return redirect('/login');
        }
        if($request->path() == 'login'){
            return redirect('/');
        } */
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
