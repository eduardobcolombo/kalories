<?php

namespace App\Http\Controllers;

use App\Services\CalorieService;
use Illuminate\Http\Request;
use App\Repositories\CalorieRepository;
use App\Http\Requests\AdminCalorieRequest;
use App\Http\Requests\AdminCalorieFilterRequest;
use Illuminate\Support\Facades\Auth;


class CaloriesController extends Controller
{
    private $repository;
    /**
     * @var CalorieService
     */
    private $service;

    public function __construct(CalorieRepository $repository, CalorieService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        $user = Auth::user();
        $calories = $this->repository->findWhere(['user_id' => $user->id]);

        return view('admin.calories.index', compact('calories','user'));
    }

    public function create()
    {
        return view('admin.calories.create');
    }

    public function store(AdminCalorieRequest $request)
    {
        $data = $request->all();

        $this->service->create($data);

        return redirect()->route('admin.calories.index');
    }

    public function edit($id)
    {
        $calorie = $this->repository->find($id);

        return view('admin.calories.edit',compact('calorie'));

    }

    public function update(AdminCalorieRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.calories.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('admin.calories.index');
    }

    public function filter(AdminCalorieFilterRequest $request)
    {
        $user = Auth::user();
        $from = $request->get('from');
        $to = $request->get('to');
        $calories = $this->repository->getByDate($from, $to);
//        dd($calories);
        return view('admin.calories.index', compact('calories','from','to','user'));
    }

}
