<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaracteristicaProduto extends Model
{

    /**
     * If the table has the created_at and updated_at fields.
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'caracteristicas_produtos';

}
