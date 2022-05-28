<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Orcamentos;

/**
 * Class OrcamentosTransformer.
 *
 * @package namespace App\Transformers;
 */
class OrcamentosTransformer extends TransformerAbstract
{
    /**
     * Transform the Orcamentos entity.
     *
     * @param \App\Entities\Orcamentos $model
     *
     * @return array
     */
    public function transform(Orcamentos $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
