<?php

namespace App\Presenters;

use App\Transformers\MateriaisTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class MateriaisPresenter.
 *
 * @package namespace App\Presenters;
 */
class MateriaisPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MateriaisTransformer();
    }
}
