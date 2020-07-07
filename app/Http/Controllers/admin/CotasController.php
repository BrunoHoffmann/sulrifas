<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Cota;
use App\Http\Model\Sorteio;
use App\Http\Model\Lead;
use Illuminate\Support\Facades\DB;

class CotasController extends Controller
{
   /**
     *
     * @param $id_sorteio
     * @return \Illuminate\Http\Response
     */
    public function index($id_sorteio)
    {
        $cota = Cota::where('cotas.id_sorteio', $id_sorteio)
                    ->leftJoin('lead as l', 'l.id', '=', 'cotas.id_lead')
                    ->join("sorteios", "sorteios.id", "=", "cotas.id_sorteio")
                    ->select('cotas.*', 'l.name as leadName', "sorteios.winner")
                    ->get();


        $winner = Cota::where("cotas.id",$cota[0]->winner)
                    ->Join('lead as l', 'l.id', '=', 'cotas.id_lead')
                    ->select("cotas.*", "l.name")->get();

        /*$sorteios = DB::table('sorteios')
        ->leftJoin("cotas", "cotas.id", "=", "sorteios.winner")
        ->leftJoin("lead", "lead.id", "=", "cotas.id_lead")
        ->select('sorteios.*', 'lead.name as ganhador')
        ->get();*/

        return view('admin.sorteios.cotas.index', [
            'id_sorteio' => $id_sorteio,
            'cotas' => $cota,
            "winner" => $winner[0]->name
        ]);
    }

    /**
     *
     * @param $id_sorteio
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function livre($id_sorteio, $id)
    {
        $cota = Cota::where('id_sorteio', $id_sorteio)->where('id', $id)->update([
            'status' => 'livre',
            'id_lead' => null
        ]);

        return redirect()->route('cotas.index', $id_sorteio);
    }

   /**
     *
     * @param $id_sorteio
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function createReserva($id_sorteio, $id)
    {
        $lead = Lead::all();

        return view('admin.sorteios.cotas.create', [
            'id' => $id,
            'id_sorteio' => $id_sorteio,
            'leads' => $lead
        ]);
    }

    /**
     *
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id_sorteio
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function storeReserva(Request $request, $id_sorteio, $id)
    {
        $cota = Cota::where('id_sorteio', $id_sorteio)->where('id', $id)->update([
            'id_lead' => $request->lead,
            'status' => 'reservar'
        ]);

        return redirect()->route('cotas.index', $id_sorteio);
    }


    /**
     *
     * @param $id_sorteio
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function pago($id_sorteio, $id)
    {
        $verifica = Cota::find($id);

        if($verifica->id_lead) {
            $cota = Cota::where('id_sorteio', $id_sorteio)->where('id', $id)->update([
                'status' => 'pago'
            ]);
        }

        return redirect()->route('cotas.index', $id_sorteio);
    }

    /**
     * Ganhador
     */
    public function winner($id_sorteio, $id)
    {
        $verifica = Cota::find($id);

        if($verifica->id_lead and ($verifica->status == 'pago' or $verifica->status == 'ver resultado')) {
            $sorteio = Sorteio::find($id_sorteio)->update([
                "winner" => $id,
                "status" => "ver resultado"
            ]);
        }

        return redirect()->route('cotas.index', $id_sorteio);
    }
}
