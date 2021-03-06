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
    public function getEnderecoAttribute()
    {
        $endereco = $this->attributes['endereco'];
        if($endereco)
        {
            $json = json_decode($endereco,true);
            return $json;
        }
    }


    // public function getEnderecoAttribute()
    // {
    //     $endereco = $this->attributes['endereco'];
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
    //         }
    //     }
    //     return $endereco;
    // }
    
    public function getCnpjAttribute()
    {
        $cnpj = $this->attributes['cnpj'];
        if(strlen($cnpj) == 11)
        {
            $cnpj = substr($cnpj, 0, 3) . '.' . substr($cnpj, 3, 3) . '.' . substr($cnpj, 6, 3) . '-' . substr($cnpj, 9);
        }else if(strlen($cnpj) > 11)
        {
            $cnpj = substr($cnpj, 0, 2) . '.' . substr($cnpj, 2, 3) . '.' . substr($cnpj, 5, 3) . '/' . substr($cnpj, 8, 4). '-'.substr($cnpj, 12);
        }
        return $cnpj;
    }


}
