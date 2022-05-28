<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Orcamentos.
 *
 * @package namespace App\Entities;
 */
class Orcamentos extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa_id',
        'cliente_id',
        'data_inicio',
        'data_final',
        'data_garantia',
        'etapa',
        'forma_pagamento',
        'endereco_obra'
    ];

}
