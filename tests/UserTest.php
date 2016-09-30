<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * Test new user registration Assert TRUE
     *
     * @return void
     */
    public function testNewUserRegistrationAssertTrue()
    {
        $email = str_random(10);

        $this->visit('/register')
            ->type('Eduardo', 'name')
            ->type( $email.'@kalories.com', 'email')
            ->type('111111', 'password')
            ->type('111111', 'password_confirmation')
            ->type('123', 'calories_expected')
            ->press('Register')
            ->seePageIs('/admin/calories');
    }
    /**
     * Test new user registration assert false short password
     *
     * @return void
     */
    public function testNewUserRegistrationAssertFalse()
    {
        $email = str_random(10);

        $this->visit('/register')
            ->type('Eduardo', 'name')
            ->type( $email.'@kalories.com', 'email')
            ->type('11111', 'password')
            ->type('11111', 'password_confirmation')
            ->type('123', 'calories_expected')
            ->press('Register')
            ->dontSeeIsAuthenticated();
    }
}
