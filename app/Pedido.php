<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    /**
     * If the table has the created_at and updated_at fields.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'data'];

}
