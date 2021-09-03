<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'username'      => 'required|alpha|unique:users,username',
            'fname'         => 'required|string',
            'lname'         => 'required|string',
            'email'         => 'required|email',
            'password'      => 'required|min:8',
            'role_id'       => 'required'
        ]);

        $UserData = new User([
            'username'  => $request->input('username'),
            'fname'     => $request->input('fname'),
            'lname'     => $request->input('lname'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
            'role_id'   => $request->input('role_id')            
        ]);
        $UserData->save();

        return response()->json('User was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(User::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $this->validate($request, [
            'username'      => 'required|alpha|unique:users,username,'.$id,
            'fname'         => 'required|string',
            'lname'         => 'required|string',
            'email'         => 'required|email',
            'password'      => 'nullable|min:8',
            'role_id'       => 'required'
        ]);

        $user = User::find($id);
        $user->username = $request->input('username');
        $user->fname    = $request->input('fname');
        $user->lname    = $request->input('lname');
        $user->email    = $request->input('email');
        $user->role_id  = $request->input('role_id');

        if(!empty($request->input('password')))
            $user->password = Hash::make($request->input('password'));

        $user->save();
        return response()->json('User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json('User deleted!');
    }
}
