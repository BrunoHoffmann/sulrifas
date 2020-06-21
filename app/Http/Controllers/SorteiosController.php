<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Lead;
use App\Http\Model\Bank;

class SorteiosController extends Controller
{
    public function index()
    {
        $slug = 'teste-slug';

        return view("site.sorteios.sorteios", [
            'slug' => $slug
        ]);
    }

    public function show($slug)
    {
        $banks = Bank::all();
        // pegar sorteio no db e mandar os dados pra view
        $encerrado = true;
        if($encerrado) {
            return view('site.sorteios.showOpen', [
                'slug' => $slug,
                'banks' => $banks
            ]);
        }else {
            return view('site.sorteios.showClosed', [
                'slug' => $slug,
                'banks' => $banks
            ]);
        }
    }

    public function reservar(Request $request, $slug)
    {
        $lead = Lead::create($request->all());

        return redirect()->route('sorteios.show', $slug);
    }
}
