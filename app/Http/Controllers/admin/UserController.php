<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

        return view('admin.users.index', [
            'users' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $UserRequest
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = User::where('email', $request->email)->get();

        if(!empty($user[0]->email)) {
            return view('admin.users.create', [
                'error' => 'E-mail já existente'
            ]);
        }

        $password = Hash::make($request->password);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $password
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::where('email', $request->email)->where('id', '!=', $id)->get();
        if(!empty($user[0]->email)) {
            return view('admin.users.edit', [
                'error' => 'E-mail já existente'
            ]);
        }

        $password = Hash::make($request->password);

        $user = User::find($id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $password
        ]);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->delete();

        if(!empty($user[0]->id)) {
            return view('admin.users.edit', [
                'error' => 'Não foi possivel deletar usuário'
            ]);
        }

        return redirect()->route('users.index');
    }

}
