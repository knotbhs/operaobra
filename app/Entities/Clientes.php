<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Clientes.
 *
 * @package namespace App\Entities;
 */
class Clientes extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [        
        "name",
        "cnpj",
        "email",
        "telefone",
        "endereco",
        "obs"
    ];

}
