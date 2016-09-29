<?php

use App\Models\Calorie;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CaloriesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDisplaysCalories()
    {
        $this->visit('/home')
            ->see('Calories')
            ->dontSee('Beta');
        $this->visit('/admin/calories')
            ->see('Calories')
            ->dontSee('User');
    }

    public function testHasItemInBox()
    {

        $data = array(
            'user_id'=> '4',
            'date'=> '2016-09-02',
            'time'=> '01:01:01',
            'text'=> 'text text',
            'number_of_calories'=> '50'
        );
        $calorie = new Calorie();
        $calorie->create($data);


    }
}
