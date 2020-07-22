<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cidades extends Model
{
    protected $table='cidades';
    protected $fillable= ['nome', 'uf', 'cep'];
}
