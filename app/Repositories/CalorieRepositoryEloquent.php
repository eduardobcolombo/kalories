<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CalorieRepository;
use App\Models\Calorie;
use App\Validators\CalorieValidator;

/**
 * Class CalorieRepositoryEloquent
 * @package namespace App\Repositories;
 */
class CalorieRepositoryEloquent extends BaseRepository implements CalorieRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Calorie::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
