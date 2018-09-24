<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'item_id' => 1,
            'user_id' => 1,
            'rating' => 5,
            'detail' => 'I bought this phone about a month ago and it is amazing.',
            'date' => '23-8-2017',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 2,
            'user_id' => 2,
            'rating' => 4,
            'detail' => 'it very fast and this is the best labtop that I never have.',
            'date' => '23-9-2018',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 3,
            'user_id' => 3,
            'rating' => 3,
            'detail' => 'I bought this phone today and have to say that it has exceeded my expectations.',
            'date' => '10-8-2017',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 7,
            'user_id' => 4,
            'rating' => 5,
            'detail' => 'I was not expecting much for the price point but this a fantastic camera and is value for money.',
            'date' => '23-9-2018',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 5,
            'user_id' => 5,
            'rating' => 4,
            'detail' => 'It works perfect, very fast and comfortable, very easy to use.',
            'date' => '25-10-2017',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 6,
            'user_id' => 6,
            'rating' => 3,
            'detail' => 'I bought the phone yesterday and have loved it since, the screen is great and the ui is fantastic.',
            'date' => '23-5-2018',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 7,
            'user_id' => 2,
            'rating' => 4,
            'detail' => 'Bought this a couple of weeks ago and have been enjoying it.',
            'date' => '2-5-2017',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 8,
            'user_id' => 3,
            'rating' => 2,
            'detail' => 'Purchased last month. The build quality is top notch. Display is bright & clear.',
            'date' => '23-9-2018',
            'updated_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
