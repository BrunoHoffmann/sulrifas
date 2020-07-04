<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Cota;
use App\Http\Model\Lead;

class LeadsController extends Controller
{
    public function index()
    {
        $leads = Lead::all();

        return view('admin.leads.index', [
            'leads' => $leads
        ]);
    }

    public function destroy($id)
    {
        $lead = Lead::find($id)->delete();


        if(empty($lead->id)) {
            $cota = Cota::where("id_lead", $id)->update([
                "status" => "livre",
                "id_lead" => null
            ]);
        }

        return redirect()->route('banks.index');
    }
}

