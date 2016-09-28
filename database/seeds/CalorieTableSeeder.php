<?php

use App\Models\Calorie;
use Illuminate\Database\Seeder;

class CalorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        /*
         * Create 10 Users in the app
         */
        factory(Calorie::class, 30)
            ->create();

    }
}
