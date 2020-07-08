<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InstituicaoRequest;
use App\Http\Model\Instituicao;
use Illuminate\Support\Str;

class InstituicoesController extends Controller
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
    public function index()
    {
        $instituicoes = Instituicao::All();

        return view('admin.instituicoes.index', [
            'instituicoes' => $instituicoes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.instituicoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\InstituicaoRequest  $InstituicaoRequest
     * @return \Illuminate\Http\Response
     */
    public function store(InstituicaoRequest $request)
    {

        $idInstituicao = Instituicao::create([
            "name" => $request->name,
            "cnpj" => $request->cnpj,
            "city" => $request->city,
            "state" => $request->state,
            "background" => $request->background,
            "link" => $request->link,
            "active" => $request->active
        ]);
        $id = $idInstituicao->id;
        //verificando se tem alguma imagem de capa
        if($request->hasFile("photo_name") && $request->file("photo_name")->isValid()) {
            //criando um nome aleatorio para a imagem
            $name = $id.Str::random(40);
            $extension = $request->file("photo_name")->extension();
            $nameFile = "{$name}.{$extension}";

            $upload = $request->file("photo_name")->storeAs("instituicoes", $nameFile);

            if($upload) {
                //inserir no banco
                $capa = Instituicao::find($id)->update([
                    'name_photo' => $nameFile
                ]);
            }else {
                return view('admin.instituicoes.create', [
                    'error' => 'Erro no upload da capa'
                ]);
            }
        }
        return redirect()->route('instituicoes.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instituicoes = Instituicao::find($id);

        return view("admin.instituicoes.edit", [
            "instituicoes" => $instituicoes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\InstituicaoRequest  $InstituicaoRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstituicaoRequest $request, $id)
    {
        $idInstituicao = Instituicao::find($id)->update([
            "name" => $request->name,
            "cnpj" => $request->cnpj,
            "city" => $request->city,
            "state" => $request->state,
            "background" => $request->background,
            "link" => $request->link,
            "active" => $request->active
        ]);

        //verificando se tem alguma imagem de capa
        if($request->hasFile("photo_name") && $request->file("photo_name")->isValid()) {
            //criando um nome aleatorio para a imagem
            $name = $id.Str::random(40);
            $extension = $request->file("photo_name")->extension();
            $nameFile = "{$name}.{$extension}";

            $upload = $request->file("photo_name")->storeAs("instituicoes", $nameFile);

            if($upload) {
                //inserir no banco
                $capa = Instituicao::find($id)->update([
                    'name_photo' => $nameFile
                ]);
            }else {
                return view('admin.instituicoes.create', [
                    'error' => 'Erro no upload da capa'
                ]);
            }
        }
        return redirect()->route('instituicoes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instituicoes = Instituicao::find($id)->delete();

        if(!empty($instituicoes->id)) {
            return view('admin.instituicoes.edit', [
                'error' => 'Não foi possivel deletar usuário'
            ]);
        }

        return redirect()->route('instituicoes.index');
    }
}
