<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Model\Sorteio;
use App\Http\Model\Lead;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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
        //$sfm =

        //leads
        $leads = Lead::all()->count();

        return view('admin.dashboard', [
            "sorteiosAberto" => $sorteiosAberto,
            "sorteiosFinalizados" => $sorteiosFinalizados,
            "sorteiosTotal" => $sorteiosTotal,
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
