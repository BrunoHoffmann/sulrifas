<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Sorteio_img extends Model
{
    protected $table = 'sorteios_img';

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
