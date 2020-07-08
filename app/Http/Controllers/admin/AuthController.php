<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Model\Sorteio;
use App\Http\Model\Lead;
use App\Http\Model\Cota;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        if(Auth::check() === true) {
            return redirect()->route('admin.home');
        }

        return view('admin.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        //sorteios
        $sorteiosAberto = Sorteio::where("status", "comprar")->count();
        $sorteiosFinalizados = Sorteio::where("status", "ver resultado")->count();
        $sorteiosTotal = Sorteio::where("status", "!=", "em breve")->count();

        //faturamento
        $mesAtual = date('m');
        $sft = Cota::select("sorteios.value")
                ->join("sorteios", "sorteios.id", "=", "cotas.id_sorteio")
                ->where("cotas.status", "pago")
                ->sum("sorteios.value");
        $sfm = Cota::select("sorteios.value")
                ->join("sorteios", "sorteios.id", "=", "cotas.id_sorteio")
                ->where("cotas.status", "pago")->whereMonth("sorteios.data_sorteio", $mesAtual)
                ->sum("sorteios.value");

        //leads
        $leads = Lead::all()->count();

        return view('admin.dashboard', [
            "sorteiosAberto" => $sorteiosAberto,
            "sorteiosFinalizados" => $sorteiosFinalizados,
            "sorteiosTotal" => $sorteiosTotal,
            "faturamentoMes" => $sfm,
            "faturamentoTotal" => $sft,
            "leads" => $leads
        ]);

    }

    public function login(Request $request)
    {
        if(in_array('', $request->only('email', 'password'))) {
            $json['message'] = $this->message->error('Ooops, informe todos os dados para efetuar o login')->render();
            return response()->json($json);
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $json['message'] = $this->message->error('Ooops, e-mail informado não é válido')->render();
            return response()->json($json);
        }

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(!Auth::attempt($credentials)) {
            $json['message'] = $this->message->error('Ooops, usuário e senha incorretos')->render();
            return response()->json($json);
        }
        $nameUser = User::firstWhere('email', $request->email);
        session(['user' => $nameUser['name']]);
        session(['id' => $nameUser['id']]);

        $json['redirect'] = route('admin.home');
        return response()->json($json);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

}
