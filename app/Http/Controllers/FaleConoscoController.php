<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Seo;

class FaleConoscoController extends Controller
{
    private $seo;

    public function __construct()
    {
        $this->seo = new Seo();
    }


    public function index()
    {
        $head = $this->seo->render(
            "Fale Conosco | SulRifas",
            "Contatos para poder entrar em contato com SulRifas",
            "sulrifas.com.br",
            "https://via.placeholder.com/1200x628.png?text=FaleConosco+SulRifas"
        );

        return view("site.faleconosco", [
            "head" => $head
        ]);
    }
}
