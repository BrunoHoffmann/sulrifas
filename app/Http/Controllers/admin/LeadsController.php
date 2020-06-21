<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
