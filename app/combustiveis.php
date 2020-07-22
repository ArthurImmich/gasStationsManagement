<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class combustiveis extends Model
{
    protected $table='combustiveis';
    protected $fillable= ['tipo', 'data_coleta', 'preco_venda', 'id_posto'];
}
