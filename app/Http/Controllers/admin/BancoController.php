<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Bank;
use App\Http\Model\Type_bank;
use App\Http\Requests\BankRequest;

class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::All();

        return view('admin.banco.index', [
            'banks' => $banks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type_bank::all();

        return view('admin.banco.create', [
            "type" => $type
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $Request
     * @return \Illuminate\Http\Response
     */
    public function store(bankRequest $request)
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

    public function setDado(string $dados)
    {

    }
}
