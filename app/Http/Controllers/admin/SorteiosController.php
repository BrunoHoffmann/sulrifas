<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\User;

class SorteiosController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.sorteios.index', [
            "users" => $user
        ]);
    }

    public function create()
    {
        return view('admin.sorteios.create');
    }

    public function store()
    {

    }

    public function edit()
    {
        return view('admin.sorteios.edit');
    }
}
