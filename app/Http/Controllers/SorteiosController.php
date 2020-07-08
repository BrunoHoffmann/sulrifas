<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Lead;
use App\Http\Model\Bank;
use App\Http\Model\Sorteio;
use App\Http\Model\Cota;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Helpers\Seo;

class SorteiosController extends Controller
{
    private $seo;

    public function __construct()
    {
        $this->seo = new Seo();
        date_default_timezone_set('America/Sao_Paulo');
    }



    public function index($tag = null)
    {
        $head = $this->seo->render(
            "Sorteios | SulRifas",
            "Todos os sorteios do SulRifas",
            "sulrifas.com.br",
            "https://via.placeholder.com/1200x628.png?text=Sorteios+SulRifas"
        );

        if ($tag) {
            if ($tag == 'encerrado') {
                $tag = 'ver resultado';
            }else if($tag == 'breve') {
                $tag = 'em breve';
            }

            $slug = 'teste-slug';
            $sorteios = DB::table('sorteios')
            ->join('sorteios_capas', 'sorteios_capas.id_sorteio', '=', 'sorteios.id')->where('sorteios.status', $tag)
            ->select('sorteios.*', 'sorteios_capas.name as capa')
            ->get();
            return view("site.sorteios.sorteios", [
                'slug' => $slug,
                'sorteios' => $sorteios,
                "head" => $head
            ]);
        }else {
            $slug = 'teste-slug';
            $sorteios = DB::table('sorteios')
            ->join('sorteios_capas', 'sorteios_capas.id_sorteio', '=', 'sorteios.id')
            ->select('sorteios.*', 'sorteios_capas.name as capa')
            ->get();
            return view("site.sorteios.sorteios", [
                'slug' => $slug,
                'sorteios' => $sorteios,
                "head" => $head
            ]);
        }

    }

    public function show($slug, $activeBank = null, $filter = null)
    {
        $banks = DB::table('bank')->join('type_bank', 'bank.type_id', '=', 'type_bank.id')
                                  ->select('bank.*', 'type_bank.name as type_name')
                                  ->get();

        $sorteio = DB::table('sorteios')
                        ->join('sorteios_img', 'sorteios_img.id_sorteio', '=', 'sorteios.id')
                        ->leftJoin("cotas", "cotas.id", "=", "sorteios.winner")
                        ->leftJoin("lead", "lead.id", "=", "cotas.id_lead")
                        ->where('sorteios.slug', $slug)
                        ->select('sorteios.*', 'sorteios_img.name as imgs', 'lead.name as ganhador')
                        ->get();
        $imgs = [];
        $count = 0;
        foreach($sorteio as $item) {
            $imgs[$count] = $item->imgs;
            $count++;
        }

        //FILTER para todos
        if(!$filter or $filter == 'todos') {
            $cotas = DB::table('cotas')
            ->leftjoin('lead', 'cotas.id_lead', '=', 'lead.id')
            ->select('cotas.*', 'lead.name as nome')
            ->where('cotas.id_sorteio', $sorteio[0]->id)
            ->get();
        }else {
            $cotas = DB::table('cotas')
            ->leftjoin('lead', 'cotas.id_lead', '=', 'lead.id')
            ->select('cotas.*', 'lead.name as nome')
            ->where('cotas.id_sorteio', $sorteio[0]->id)
            ->where('status', $filter)
            ->get();
        }

        //Filter das cotas
        $livre = Cota::where('id_sorteio', $sorteio[0]->id)->where('status', 'livre')->count();
        $reservado = Cota::where('id_sorteio', $sorteio[0]->id)->where('status', 'reservado')->count();
        $pago = Cota::where('id_sorteio', $sorteio[0]->id)->where('status', 'pago')->count();

        //colocar para poder comprar se for liberado
        date_default_timezone_set('America/Sao_Paulo');
        if($sorteio[0]->data_liberar <= date('Y-m-d')) {
            Sorteio::find($sorteio[0]->id)->update([
                'status' => 'comprar'
            ]);
        }

        //SEO
        $head = $this->seo->render(
            "Sorteio do " . $sorteio[0]->name . " | SulRifas",
            "Sorteio de um " . $sorteio[0]->name,
            "sulrifas.com.br",
            "https://via.placeholder.com/1200x628.png?text=Sorteios+SulRifas"
        );


        //verifica se passou 12 horas
        foreach($cotas as $item) {
            if($item->status == "reservado") {
                $hora = 12*60*60;
                $dataM = strtotime($item->time_compra) + $hora;
                $dataM = date("Y-m-d H:i:s", $dataM);

                if(date("Y-m-d H:i:s") >= $dataM) {
                    $cota = Cota::where("id", $item->id)->update([
                        "status" => "livre",
                        "id_lead" => null,
                        "time_compra" => null
                    ]);
                }
            }
        }

        if($sorteio[0]->status !== 'ver resultado') {
            return view('site.sorteios.showOpen', [
                'slug' => $slug,
                'banks' => $banks,
                'sorteio' => $sorteio[0],
                'cotas' => $cotas,
                'livre' => $livre,
                'reservado' => $reservado,
                'pago' => $pago,
                'activeBank' => $activeBank,
                'imgs' => $imgs,
                "head" => $head
            ]);
        }else {
            $winner = Sorteio::where("sorteios.id", $sorteio[0]->id)
                        ->Join("cotas", "cotas.id", "sorteios.winner")
                        ->join("lead", "lead.id", "cotas.id_lead")
                        ->select("lead.name", "cotas.number")->get();

            return view('site.sorteios.showClosed', [
                'slug' => $slug,
                'banks' => $banks,
                'sorteio' => $sorteio[0],
                'imgs' => $imgs,
                "winner" => $winner[0],
                "head" => $head
            ]);
        }
    }

    public function reservar(Request $request, $slug)
    {
        if(!$request->name or !$request->email or !$request->phone) {
            return redirect()->route('sorteios.show', $slug);
        }else {
            $lead = Lead::where('email', $request->email)->first();
            if(!isset($lead->id)) {
                $lead = Lead::create($request->all());
            }

            $dataAtual = date("Y-m-d H:i:s");
            $sorteio = Sorteio::where('slug', $slug)->first();
            $cotas = Cota::where("id",$request->cota)->update([
                'id_lead' => $lead->id,
                'status' => 'reservado',
                'time_compra' => $dataAtual
            ]);

            $activeBank = true;
            return $this->show($slug, $activeBank);
        }

    }


    public function filter($slug, $filter)
    {
        return $this->show($slug, null, $filter);
    }

}
