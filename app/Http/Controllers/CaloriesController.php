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

        return view('admin.calories.index', compact('calories'));
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
        $from = $request->get('from');
        $to = $request->get('to');
        $calories = $this->repository->getByDate($from, $to);
//        dd($calories);
        return view('admin.calories.index', compact('calories','from','to'));
    }


    public function export($id)
    {


        $fileName = time();
        $headers = null;
        // Create a new file xlsx to export
        $excel =\Excel::create($fileName, function($config) {

            // Set orientation
            $config->setTitle('Exporting Calories')
                ->setCompany('Eduardo de Brito Colombo')
                // Call them separately
                ->setDescription('This file export data of calories')
            ;
        });
        $order = $this->repository->find($id);

        $excel->sheet('Kalories', function($sheet) use ($headers,$order) {


            $sheet->row(1, array(' ',' ',' '));
            $sheet->row(2, array(' ',' ',' '));
            $sheet->row(3, array(' ',' ',' '));
            $sheet->row(4, array(' ',' ',' '));
            $sheet->row(5, array(' ',' ',' '));
            $sheet->row(6, array(' ',' ',' '));
            // Employ to Order
            $sheet->row(7, array(' ',' ', $order->razao_social));
            // CNPJ Code to Order
            $sheet->row(8, array(' ',' ', $order->cnpj));
            // Apply text format to cell CNPJ
            $sheet->setColumnFormat(array(
                'C8' => '@',
            ));
            // State Code to Order
            $sheet->row(9, array(' ',' ', $order->uf));
            // IE Code to Order
            $sheet->row(10, array(' ',' ', $order->ie));
            // Apply text format to cell IE
            $sheet->setColumnFormat(array(
                'C10' => '@',
            ));
            $sheet->row(11, array(' ',' ',' '));
            $sheet->row(12, array(' ',' ', 'Normal'));
            $sheet->row(13, array(' ',' ',' '));

            $rowNumber = 13;
            foreach($order->items as $item){
                $rowNumber++;

                $sheet->row($rowNumber, array(
                    $item->red,$item->ref,$item->descricao,$item->unidade,$item->quantidade,$item->preco,($item->quantidade * $item->preco)
                ));
            }
        })->export('xlsx');
    }

}
