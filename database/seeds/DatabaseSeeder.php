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
<<<<<<< HEAD
            'email' => 'admin@mail.com',
            'password' => Hash::make('secret123'),
        ]);

        DB::table('careers')->insert([
            'career_name' => 'carrera 1',
            'description' => 'carrera 1',
        ]);

        DB::table('careers')->insert([
            'career_name' => 'carrera 2',
            'description' => 'carrera 2',
        ]);

        DB::table('software_types')->insert([
            'software_type_name' => 'tipo 1',
            'description' => 'tipo 1',
        ]);

        DB::table('software_types')->insert([
            'software_type_name' => 'tipo 2',
            'description' => 'tipo 2',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'cat1',
            'description' => 'tipo 1',
        ]);

        DB::table('categories')->insert([
            'category_name' => 'marca 1',
            'description' => 'tipo 1',
        ]);

        DB::table('trademarks')->insert([
            'trademark_name' => 'marca 2',
            'description' => 'tipo 2',
        ]);

        DB::table('trademarks')->insert([
            'trademark_name' => 'marca 2',
            'description' => 'tipo 2',
        ]);  

        DB::table('frequencies')->insert([
            'frequency_name' => 'freq 1',
            'description' => 'tipo 1',
        ]);

        DB::table('frequencies')->insert([
            'frequency_name' => 'freq 2',
            'description' => 'tipo 2',
        ]);

        DB::table('priorities')->insert([
            'priority_name' => 'prio 1',
            'description' => 'tipo 1',
        ]);

        DB::table('priorities')->insert([
            'priority_name' => 'prio 2',
            'description' => 'tipo 2',
        ]);

        DB::table('positions')->insert([
            'position_name' => 'cargo 1',
            'description' => 'tipo 1',
        ]);

        DB::table('positions')->insert([
            'position_name' => 'cargo 2',
            'description' => 'tipo 2',
        ]);

        DB::table('reasons')->insert([
            'reason_name' => 'razon 1',
            'description' => 'tipo 1',
        ]);

        DB::table('reasons')->insert([
            'reason_name' => 'razon 2',
            'description' => 'tipo 2',
        ]);

        DB::table('places')->insert([
            'place_name' => 'lugar 1',
            'description' => 'tipo 1',
        ]);

        DB::table('places')->insert([
            'place_name' => 'lugar 2',
            'description' => 'tipo 2',
        ]);


=======
            
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
        ]);
>>>>>>> dba0700bca3ff6d2d1dfdb43ce649c2ce065514d
        
        // $this->call(UsersTableSeeder::class);
    }
}
