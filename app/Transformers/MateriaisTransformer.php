<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Materiais;

/**
 * Class MateriaisTransformer.
 *
 * @package namespace App\Transformers;
 */
class MateriaisTransformer extends TransformerAbstract
{
    /**
     * Transform the Materiais entity.
     *
     * @param \App\Entities\Materiais $model
     *
     * @return array
     */
    public function transform(Materiais $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
