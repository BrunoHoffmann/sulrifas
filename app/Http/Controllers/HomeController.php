<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Sorteio;
use Illuminate\Support\Facades\DB;
use App\Helpers\Seo;

class HomeController extends Controller
{
    private $seo;

    public function __construct()
    {
        $this->seo = new Seo();
    }

    public function index()
    {
        $head = $this->seo->render(
            "SulRifas",
            "Site de sorteio de carros e motos",
            "sulrifas.com.br",
            "https://via.placeholder.com/1200x628.png?text=Home+SulRifas"
        );

        $sorteios = DB::table('sorteios')
                     ->join('sorteios_capas', 'sorteios_capas.id_sorteio', '=', 'sorteios.id')
                     ->select('sorteios.*', 'sorteios_capas.name as capa')
                     ->get();

        $ultimo = DB::table('sorteios')
                    ->join('sorteios_capas', 'sorteios_capas.id_sorteio', '=', 'sorteios.id')
                    ->select('sorteios.*', 'sorteios_capas.name as capa')
                    ->where('sorteios.status', 'comprar')
                    ->orderBy('sorteios.id', 'desc')
                    ->first();

        return view("site.home", [
            'sorteios' => $sorteios,
            'ultimo' => $ultimo
        ]);
    }

    public function error()
    {
        return view('site.404');
    }
}
