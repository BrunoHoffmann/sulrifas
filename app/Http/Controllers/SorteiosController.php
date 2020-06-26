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

class SorteiosController extends Controller
{
    public function index($tag = null)
    {
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
                'sorteios' => $sorteios
            ]);
        }else {
            $slug = 'teste-slug';
            $sorteios = DB::table('sorteios')
            ->join('sorteios_capas', 'sorteios_capas.id_sorteio', '=', 'sorteios.id')
            ->select('sorteios.*', 'sorteios_capas.name as capa')
            ->get();
            return view("site.sorteios.sorteios", [
                'slug' => $slug,
                'sorteios' => $sorteios
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
        ->where('sorteios.slug', $slug)
        ->select('sorteios.*', 'sorteios_img.name as imgs')
        ->get();

        $imgs = [];
        $count = 0;
        foreach($sorteio as $item) {
            $imgs[$count] = $item->imgs;
            $count++;
        }

        $cotas = DB::table('cotas')->leftjoin('lead', 'cotas.id_lead', '=', 'lead.id')
                                  ->select('cotas.*', 'lead.name as nome')->where('cotas.id_sorteio', $sorteio[0]->id)
                                  ->get();

        $livre = Cota::where('id_sorteio', $sorteio[0]->id)->where('status', 'livre')->count();
        $reservado = Cota::where('id_sorteio', $sorteio[0]->id)->where('status', 'reservado')->count();
        $pago = Cota::where('id_sorteio', $sorteio[0]->id)->where('status', 'pago')->count();

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
                'imgs' => $imgs
            ]);
        }else {
            return view('site.sorteios.showClosed', [
                'slug' => $slug,
                'banks' => $banks,
                'sorteio' => $sorteio[0],
                'cotas' => $cotas,
                'imgs' => $imgs
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

            $sorteio = Sorteio::where('slug', $slug)->first();
            $cotas = Cota::find($request->cota)->update([
                'id_lead' => $lead->id,
                'status' => 'reservado'
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
