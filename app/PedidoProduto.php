<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
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
    protected $fillable = ['idPedido', 'idProduto', 'quantidade', 'subtotal'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pedidos_produtos';

}
