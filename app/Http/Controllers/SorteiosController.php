<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SorteiosController extends Controller
{
    public function index()
    {
        return view("site.sorteios.sorteios");
    }

    public function show($id)
    {
        return view('site.sorteios.show');
    }
}
