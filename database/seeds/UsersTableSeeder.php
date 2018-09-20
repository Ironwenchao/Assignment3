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
        DB::table('users')->insert([
            'name'=>'Amy',
            'email'=>'Amy@gmail.com',
            'password'=> bcrypt('123456'),
            'dateOfBirth' => '1992-1-3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
        
         DB::table('users')->insert([
            'name'=>'Bob',
            'email'=>'Bob@gmail.com',
            'password'=> bcrypt('123456'),
            'dateOfBirth' => '1992-3-23',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
            
         DB::table('users')->insert([
            'name'=>'Candy',
            'email'=>'Candy@gmail.com',
            'password'=> bcrypt('123456'),
            'dateOfBirth' => '1998-9-23',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]); 
            
            
        DB::table('users')->insert([
            'name'=>'Dina',
            'email'=>'Dina@gmail.com',
            'password'=> bcrypt('123456'),
            'dateOfBirth' => '1968-9-3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
        
        DB::table('users')->insert([
            'name'=>'Edwin',
            'email'=>'Edwin@gmail.com',
            'password'=> bcrypt('123456'),
            'dateOfBirth' => '1978-12-3',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
            
        DB::table('users')->insert([
            'name'=>'Frank',
            'email'=>'Frank@gmail.com',
            'password'=> bcrypt('123456'),
            'dateOfBirth' => '1967-2-9',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }
}
