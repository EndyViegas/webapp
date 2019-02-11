<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table_name="cards";
    protected $fillable  = [
        'nome','descricao'
    ];
}
