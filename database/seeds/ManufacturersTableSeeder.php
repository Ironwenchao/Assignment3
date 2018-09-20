<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([
            'name' => 'Apple',
            'country' => 'America',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('manufacturers')->insert([
            'name' => 'Samsung',
            'country' => 'Korea',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('manufacturers')->insert([
            'name' => 'Huawei',
            'country' => 'China',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('manufacturers')->insert([
            'name' => 'Oppo',
            'country' => 'China',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('manufacturers')->insert([
            'name' => 'Canon',
            'country' => 'Japan',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        DB::table('manufacturers')->insert([
            'name' => 'Sony',
            'country' => 'Japan',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
