<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table_name="usuarios";
    protected $fillable  = [
        'nome'
    ];
}
