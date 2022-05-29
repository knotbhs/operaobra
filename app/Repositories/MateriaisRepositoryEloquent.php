<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MateriaisRepository;
use App\Entities\Materiais;
use App\Validators\MateriaisValidator;

/**
 * Class MateriaisRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MateriaisRepositoryEloquent extends BaseRepository implements MateriaisRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Materiais::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MateriaisValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
