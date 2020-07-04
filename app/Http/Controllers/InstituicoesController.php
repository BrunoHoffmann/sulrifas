<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Instituicao;


class InstituicoesController extends Controller
{
    public function index()
    {
        $instituicoes = Instituicao::where('active', 1)->get();

        if(!$instituicoes) {
            $instituicoes = [];
        }
        return view("site.instituicoes", [
            'instituicoes' => $instituicoes
        ]);
    }
}
