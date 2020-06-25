<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cota extends Model
{
    protected $table = 'cotas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sorteio',
        'number',
        'status',
        'id_lead'
    ];
}
