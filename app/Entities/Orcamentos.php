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
    public function getEnderecoObraAttribute()
    {
        $endereco = $this->attributes['endereco_obra'];
        if($endereco)
        {
            $json = json_decode($endereco,true);
            return $json;
        }
    }
    // public function getEnderecoObraAttribute()
    // {
        
    //     $endereco = $this->attributes['endereco_obra'];
    //     if($endereco)
    //     {
    //         $json = json_decode($endereco,true);
    //         if($json)
    //         {
    //             $rua = isset($json['rua']) ? $json['rua'] : "";
    //             $numero = isset($json['numero']) ? ", ".$json['numero'] : "";
    //             $complemento = isset($json['complemento']) ? " - ".$json['complemento'] : "";
    //             $bairro = isset($json['bairro']) ? " - ".$json['bairro'] : "";
    //             $cidade = isset($json['cidade']) ? " - ".$json['cidade'] : "";
    //             $estado = isset($json['estado']) ? "/".$json['estado'] : "";
    //             $cep = isset($json['cep']) ? " - ".$json['cep'] : "";
    //             $endereco = $rua.$numero.$complemento.$bairro.$cidade.$estado.$cep;
    //         }else
    //         {
    //             return "Não descrito";
    //         }
    //     }
    //     return $endereco;
    // }
}
