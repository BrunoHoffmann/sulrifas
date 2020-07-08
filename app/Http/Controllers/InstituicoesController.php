<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Instituicao;
use App\Helpers\Seo;

class InstituicoesController extends Controller
{
    private $seo;

    public function __construct()
    {
        $this->seo = new Seo();
    }


    public function index()
    {
        $head = $this->seo->render(
            "Instituições | SulRifas",
            "Instituições que serão beneficiadas por SulRifas",
            "sulrifas.com.br",
            "https://via.placeholder.com/1200x628.png?text=Instituicao+SulRifas"
        );

        $instituicoes = Instituicao::where('active', 1)->get();

        if(!$instituicoes) {
            $instituicoes = [];
        }
        return view("site.instituicoes", [
            'instituicoes' => $instituicoes,
            "head" => $head
        ]);
    }
}
