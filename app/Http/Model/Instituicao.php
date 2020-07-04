<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicoes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'cnpj',
        'city',
        'state',
        'link',
        'background',
        'name_photo',
        'active'
    ];
}
