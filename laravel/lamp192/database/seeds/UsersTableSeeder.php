<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for ($i=0; $i < 100; $i++) { 
    		
	        DB::table('user')->insert([
	            'username' => str_random(10),
	            'password' => Hash::make(123456),
	            'email' => str_random(10).'@gmail.com',
	            'phone' => '13'.rand(111111111,999999999),
	            'status' => 1,
	            'pic' => '/upload/25851509953597.jpg'

	        ]);

        }
    }
}
