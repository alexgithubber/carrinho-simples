<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    /**
     * If the table has the created_at and updated_at fields.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'nome', 'descricao', 'imagem', 'preco', 'caracteristicas'];

}
