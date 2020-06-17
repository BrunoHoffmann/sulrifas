<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Type_bank extends Model
{
    protected $table = 'type_bank';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    public $timestamps = false;
}
