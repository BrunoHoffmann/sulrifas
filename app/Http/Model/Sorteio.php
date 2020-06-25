<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Sorteio extends Model
{
    protected $table = 'sorteios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'year',
        'description',
        'data_sorteio',
        'data_liberar',
        'value',
        'km',
        'status',
        'active'
    ];
}
