<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       $this->call(userSeeder::class);
    }
}

class userSeeder extends Seeder{
	public function run(){
		DB::table('users')->insert(
        	[
        	'name' => 'SV01',
        	'password'=>bcrypt('123'),
        	],
            [
            'name' => 'SV02',
            'password'=>bcrypt('123'),
            ],
            [
            'name' => 'SV03',
            'password'=>bcrypt('123'),
            ],
            [
            'name' => 'SV04',
            'password'=>bcrypt('123'),
            ],
            [
            'name' => 'SV05',
            'password'=>bcrypt('123'),
            ]
        	);
	}
}
