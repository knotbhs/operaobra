<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrcamentosRepository;
use App\Entities\Orcamentos;
use App\Validators\OrcamentosValidator;

/**
 * Class OrcamentosRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrcamentosRepositoryEloquent extends BaseRepository implements OrcamentosRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Orcamentos::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return OrcamentosValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
