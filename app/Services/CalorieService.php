<?php
namespace App\Services;


use App\Repositories\CalorieRepository;
use Illuminate\Support\Facades\Auth;
class CalorieService
{

    /**
     * @var CalorieRepository
     */
    private $calorieRepository;

    public function __construct(CalorieRepository $calorieRepository)
    {
        $this->calorieRepository = $calorieRepository;
    }


    public function create(array $data)
    {

        \DB::beginTransaction();
        try {
            $user_id = Auth::user();
            $data['user_id'] = $user_id->id;
            $calorie = $this->calorieRepository->create($data);
            $calorie->save();
            \DB::commit();

            return $calorie;

        } catch (\Exception $e) {
            \DB::rollback();
            throw $e;
        }
    }

}