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
        /*this is an admin seeder*/
        DB::table('users')->insert([
            'name' => 'Moderator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'type' => 'admin',
        ]);
        
        /*these are the common users' seeder*/
        DB::table('users')->insert([
            'name'=>'Amy',
            'email'=>'Amy@gmail.com',
            'password'=> bcrypt('123456'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
        
         DB::table('users')->insert([
            'name'=>'Bob',
            'email'=>'Bob@gmail.com',
            'password'=> bcrypt('123456'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
            
         DB::table('users')->insert([
            'name'=>'Candy',
            'email'=>'Candy@gmail.com',
            'password'=> bcrypt('123456'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]); 
            
            
        DB::table('users')->insert([
            'name'=>'Dina',
            'email'=>'Dina@gmail.com',
            'password'=> bcrypt('123456'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
        
        DB::table('users')->insert([
            'name'=>'Edwin',
            'email'=>'Edwin@gmail.com',
            'password'=> bcrypt('123456'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
            
            
        DB::table('users')->insert([
            'name'=>'Frank',
            'email'=>'Frank@gmail.com',
            'password'=> bcrypt('123456'),
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
            ]);
    }
}
