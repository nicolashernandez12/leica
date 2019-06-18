<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
        ]);
        
        // $this->call(UsersTableSeeder::class);
    }
}
