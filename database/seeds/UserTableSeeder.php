<?php

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $credentials = [
				'email'=>'andreibm@yahoo.com',
				'password'=>'andrei'
        ];
        Sentinel::create($credentials);
    }
}
