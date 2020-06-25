<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Sorteio_capa extends Model
{
    protected $table = 'sorteios_capas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'id_sorteio'
    ];
}
