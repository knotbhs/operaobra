<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Clientes;

/**
 * Class ClientesTransformer.
 *
 * @package namespace App\Transformers;
 */
class ClientesTransformer extends TransformerAbstract
{
    /**
     * Transform the Clientes entity.
     *
     * @param \App\Entities\Clientes $model
     *
     * @return array
     */
    public function transform(Clientes $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
