<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Bank;

class BancoController extends Controller
{
    public function index()
    {
        $banks = Bank::All();

        return view('admin.banco.index', [
            'banks' => $banks
        ]);
    }

    public function create()
    {
        return view('admin.banco.create');
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
