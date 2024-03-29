<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    protected $table = 'bank';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'holder',
        'holder_active',
        'cpf',
        'cpf_active',
        'agency',
        'agency_active',
        'account',
        'account_active',
        'operation',
        'operation_active',
        'type_id',
        'type_active',
        'active'
    ];
}
