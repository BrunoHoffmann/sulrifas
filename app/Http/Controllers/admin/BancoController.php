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
        $type = Type_bank::where('name', $request->type)->get();

        if(empty($type[0]->id)) {
            $type = Type_bank::create([
                'name' => $request->type
            ]);
        }

        $bank = Bank::create([
            'name' => $request->name,
            'holder' => $request->holder,
            'holder_active' => $request->holder_active,
            'cpf' => $request->cpf,
            'cpf_active' => $request->cpf_active,
            'agency' => $request->agency,
            'agency_active' => $request->agency_active,
            'account' => $request->account,
            'account_active' => $request->account_active,
            'operation' => $request->operation,
            'operation_active' => $request->operation_active,
            'type_id' => $type[0]->id,
            'type_active' => $request->type_active,
            'active' => $request->active
        ]);

        return redirect()->route('banks.index');
    }

    public function edit($id)
    {
        $banks = Bank::find($id);
        $type = Type_bank::where('id', $banks->type_id)->get();

        return view('admin.banco.edit', [
            'banks' => $banks,
            'type' => $type
        ]);
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
