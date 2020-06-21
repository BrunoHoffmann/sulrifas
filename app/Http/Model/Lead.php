<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'lead';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone'
    ];
}
