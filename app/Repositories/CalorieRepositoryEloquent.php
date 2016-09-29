<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CalorieRepository;
use App\Models\Calorie;
use App\Validators\CalorieValidator;
use Illuminate\Support\Facades\Auth;

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

    public function getByDate($from, $to)
    {
        $user = Auth::user();
        $result = $this->model
            ->where('user_id', '=' ,$user->id)
            ->where('date', '>=',$from)
            ->where('date', '<=',$to)
            ->get()
        ;

        if ($result) return $this->parserResult($result);
        throw (new ModelNotFoundException)->setModel(get_class($this->model));
    }





    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
