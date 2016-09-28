<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CalorieRepository;
use App\Http\Requests\AdminCalorieRequest;

class CaloriesController extends Controller
{
    private $repository;

    public function __construct(CalorieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $calories = $this->repository->paginate(5);

        return view('admin.calories.index', compact('calories'));
    }

    public function create()
    {
        return view('admin.calories.create');
    }

    public function store(AdminCalorieRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.calories.index');
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);

        return view('admin.calories.edit',compact('category'));

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
}
