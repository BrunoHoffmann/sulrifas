<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\User;
use App\Http\Model\Cota;
use App\Http\Model\Sorteio;
use App\Http\Model\Sorteio_capa;
use App\Http\Model\Sorteio_img;
use Illuminate\Support\Str;
use App\Http\Requests\SorteioRequest;
use Illuminate\Support\Facades\Storage;

class SorteiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sorteios = Sorteio::all();

        return view('admin.sorteios.index', [
            "sorteios" => $sorteios
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sorteios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SorteioRequest  $SorteioRequest
     * @return \Illuminate\Http\Response
     */
    public function store(SorteioRequest $request)
    {
        $slug = Str::slug($request->name, '-');

        $data_liberar = $request->data_liberar;
        if(!$data_liberar) {
            $data_liberar = today();
        }

        $idSorteio = Sorteio::create([
            'name' => $request->name,
            'year' => $request->year,
            'description' => $request->description,
            'data_sorteio' => $request->data_sorteio,
            'data_liberar' => $data_liberar,
            'value' => $request->value,
            'km' => $request->km,
            'status' => $request->status,
            'active' => $request->active
        ]);
        $id = $idSorteio->id;
        $slug = $slug . '-' . $id;
        Sorteio::where('id', $id)->update([
            'slug' => $slug
        ]);

        $cotas = $request->cotas - 1;
        for($number=0; $number <= $cotas; $number++) {
            Cota::create([
                'id_sorteio' => $id,
                'number' => $this->setNumber($number, $cotas)
            ]);
        }

        //verificando se tem alguma imagem de capa
        if($request->hasFile("file_capa") && $request->file("file_capa")->isValid()) {
            //criando um nome aleatorio para a imagem
            $name = $id.Str::random(40);
            $extension = $request->file("file_capa")->extension();
            $nameFile = "{$name}.{$extension}";

            $upload = $request->file("file_capa")->storeAs("capas", $nameFile);

            if($upload) {
                //inserir no banco
                $capa = Sorteio_capa::create([
                    'name' => $nameFile,
                    'id_sorteio' => $id
                ]);
            }else {
                return view('admin.sorteios.create', [
                    'error' => 'Erro no upload da capa'
                ]);
            }
        }

        //verificando se tem alguma imagens dos sorteios
        //file_photos

        for($i = 0; $i < count($request->allFiles()['file_photos']); $i ++) {
            $file = $request->allFiles()['file_photos'][$i];

            $name = $id.Str::random(40);
            $extension = $request->file("file_photos")[$i]->extension();
            $nameFile = "{$name}.{$extension}";

            $upload = $request->file("file_photos")[$i]->storeAs("imagensSorteio", $nameFile);

            if($upload) {
                //inserir no banco
                $capa = Sorteio_img::create([
                    'name' => $nameFile,
                    'id_sorteio' => $id
                ]);
            }else {
                return view('admin.sorteios.create', [
                    'error' => 'Erro no upload da capa'
                ]);
            }
        }

        return redirect()->route('sorteios.index');
    }

    public function setNumber($number, $cotas)
    {
        if(Str::length($cotas) == 2) {
            if(Str::length($number) == 1) {
                return '0' . '0' . $number;
            }

            if(Str::length($number) == 2) {
                return '0' . $number;
            }
        }

        if(Str::length($cotas) == 3) {
            if(Str::length($number) == 1) {
                return '0' . '0' . '0' . $number;
            }

            if(Str::length($number) == 2) {
                return '0' . '0' . $number;
            }
            if(Str::length($number) == 3) {
                return '0' . $number;
            }
        }


        return $number;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sorteio = Sorteio::find($id);
        $cotas = Cota::where('id_sorteio', $id)->count();
        $capa = Sorteio_capa::firstWhere('id_sorteio', $id);
        $photos = Sorteio_img::where('id_sorteio', $id)->get();

        return view('admin.sorteios.edit', [
            'sorteio' => $sorteio,
            'file_capa' => $capa,
            'file_photos' => $photos,
            'cotas' => $cotas
        ]);
    }

    public function deleteImg($id, $name)
    {
        $img = Sorteio_capa::where('id_sorteio', $id)->where('name', $name)->delete();
        $img = Sorteio_img::where('id_sorteio', $id)->where('name', $name)->delete();

        $feito = Storage::delete('capas/'. $name);
        $feito = Storage::delete('imagensSorteio/'. $name);

        return redirect()->route('sorteios.edit', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SorteioRequest  $SorteioRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SorteioRequest $request, $id)
    {
        $slug = Str::slug($request->name, '-');

        $data_liberar = $request->data_liberar;
        if(!$data_liberar) {
            $data_liberar = today();
        }

        $idSorteio = Sorteio::find($id)->update([
            'name' => $request->name,
            'year' => $request->year,
            'description' => $request->description,
            'data_sorteio' => $request->data_sorteio,
            'data_liberar' => $data_liberar,
            'value' => $request->value,
            'km' => $request->km,
            'status' => $request->status,
            'active' => $request->active
        ]);
        $idSorteio = Sorteio::find($id);

        $id = $idSorteio->id;
        $slug = $slug . '-' . $id;
        Sorteio::where('id', $id)->update([
            'slug' => $slug
        ]);

        Cota::where('id_sorteio', $id)->delete();
        $cotas = $request->cotas - 1;
        for($number=0; $number <= $cotas; $number++) {
            Cota::create([
                    'id_sorteio' => $id,
                    'number' => $this->setNumber($number, $cotas)
            ]);
        }
        //verificando se tem alguma imagem de capa
        if($request->hasFile("file_capa") && $request->file("file_capa")->isValid()) {
            //criando um nome aleatorio para a imagem
            $name = $id.Str::random(40);
            $extension = $request->file("file_capa")->extension();
            $nameFile = "{$name}.{$extension}";

            $upload = $request->file("file_capa")->storeAs("capas", $nameFile);

            if($upload) {
                //inserir no banco
                $capa = Sorteio_capa::where('id_sorteio', $id)->update([
                    'name' => $nameFile
                ]);
            }else {
                return view('admin.sorteios.create', [
                    'error' => 'Erro no upload da capa'
                ]);
            }
        }

        //verificando se tem alguma imagens dos sorteios
        //file_photos

        if($request->hasFile("file_photos")) {
            for($i = 0; $i < count($request->allFiles()['file_photos']); $i ++) {
                $file = $request->allFiles()['file_photos'][$i];

                $name = $id.Str::random(40);
                $extension = $request->file("file_photos")[$i]->extension();
                $nameFile = "{$name}.{$extension}";

                $upload = $request->file("file_photos")[$i]->storeAs("imagensSorteio", $nameFile);

                if($upload) {
                    //inserir no banco
                    $capa = Sorteio_img::create([
                        'name' => $nameFile,
                        'id_sorteio' => $id
                    ]);
                }else {
                    return view('admin.sorteios.create', [
                        'error' => 'Erro no upload da capa'
                    ]);
                }
            }
        }

        return redirect()->route('sorteios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sorteio = Sorteio::where('id', $id)->delete();
        $cotas = Cota::where('id_sorteio', $id)->delete();

        $imgCapa = Sorteio_capa::FirstWhere('id_sorteio', $id);
        $feito = Storage::delete('capas/'. $imgCapa->name);

        $imgs = Sorteio_img::where('id_sorteio', $id)->get();
        foreach($imgs as $item) {
            $feito = Storage::delete('imagensSorteio/'. $item->name);
        }

        $capa = Sorteio_capa::where('id_sorteio', $id)->delete();
        $imagens = Sorteio_img::where('id_sorteio', $id)->delete();

        if(!empty($sorteio[0]->id) || !empty($cotas[0]->id) || !empty($capa[0]->id) || !empty($imagens[0]->id) ) {
            return view('admin.sorteios.edit', [
                'error' => 'Não foi possivel deletar usuário'
            ]);
        }

        return redirect()->route('sorteios.index');
    }
}
