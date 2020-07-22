<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class postos extends Model
{
    protected $table='postos';
    protected $fillable= ['cnpj', 'razao_social', 'nome_fantasia', 'bandeira', 'endereco', 'bairro', 'id_cidade'];
}
