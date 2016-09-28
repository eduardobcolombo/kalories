<?php

use \rasenBier\Models\Client;
use \rasenBier\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        /*
         * Create a user default
         */
        factory(User::class)->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
            'role' => 'user',
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

        /*
         * Create a user Admin
         */

        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@user.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

        /*
         * Create a user Client
         */

        factory(User::class)->create([
            'name' => 'LUCIANO DUTRA LIMA',
            'email' => 'luciano@rasenbier.com.br',
            'password' => bcrypt('123456'),
            'role' => 'client',
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

        /*
         * Create a user Deliveryman
         */

        factory(User::class)->create([
            'name' => 'Deliveryman',
            'email' => 'deliveryman@user.com',
            'password' => bcrypt('123456'),
            'role' => 'deliveryman',
            'remember_token' => str_random(10),
        ])->client()->save(factory(Client::class)->make());

        /*
         * Create 10 Users in the app
         */
//        factory(User::class, 10)->create()->each(function($u){
//            $u->client()->save(factory(Client::class)->make());
//        });




    }
}
