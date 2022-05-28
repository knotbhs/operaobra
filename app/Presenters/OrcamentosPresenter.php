<?php

namespace App\Presenters;

use App\Transformers\OrcamentosTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class OrcamentosPresenter.
 *
 * @package namespace App\Presenters;
 */
class OrcamentosPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new OrcamentosTransformer();
    }
}
