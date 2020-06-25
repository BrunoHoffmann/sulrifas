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
    public function index()
    {
        $slug = 'teste-slug';

        return view("site.sorteios.sorteios", [
            'slug' => $slug
        ]);
    }

    public function show($slug)
    {
        $banks = DB::table('bank')->join('type_bank', 'bank.type_id', '=', 'type_bank.id')
                                  ->select('bank.*', 'type_bank.name as type_name')
                                  ->get();

        $sorteio = Sorteio::where('slug', $slug)->first();

        $cotas = DB::table('cotas')->leftjoin('lead', 'cotas.id_lead', '=', 'lead.id')
                                  ->select('cotas.*', 'lead.name as nome')->where('cotas.id_sorteio', $sorteio->id)
                                  ->get();


        if($sorteio->status !== 'ver resultado') {
            return view('site.sorteios.showOpen', [
                'slug' => $slug,
                'banks' => $banks,
                'sorteio' => $sorteio,
                'cotas' => $cotas
            ]);
        }else {
            return view('site.sorteios.showClosed', [
                'slug' => $slug,
                'banks' => $banks,
                'sorteio' => $sorteio,
                'cotas' => $cotas
            ]);
        }
    }

    public function reservar(Request $request, $slug)
    {
        $lead = Lead::where('email', $request->email)->first();
        if(!$lead->id) {
            $lead = Lead::create($request->all());
        }
        $sorteio = Sorteio::where('slug', $slug)->first();
        $cotas = Cota::where('id_sorteio', $sorteio->id)->update([
            'id_lead' => $lead->id,
            'status' => 'reservado'
        ]);
        return redirect()->route('sorteios.show', $slug);
    }

}
