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
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 2,
            'user_id' => 2,
            'rating' => 4,
            'detail' => 'it very fast and this is the best labtop that I never have.',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 3,
            'user_id' => 3,
            'rating' => 3,
            'detail' => 'I bought this phone today and have to say that it has exceeded my expectations.',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 7,
            'user_id' => 4,
            'rating' => 5,
            'detail' => 'I was not expecting much for the price point but this a fantastic camera and is value for money.',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 5,
            'user_id' => 5,
            'rating' => 4,
            'detail' => 'It works perfect, very fast and comfortable, very easy to use.',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 6,
            'user_id' => 6,
            'rating' => 3,
            'detail' => 'I bought the phone yesterday and have loved it since, the screen is great and the ui is fantastic.',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 7,
            'user_id' => 2,
            'rating' => 4,
            'detail' => 'Bought this a couple of weeks ago and have been enjoying it.',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
        
        
        DB::table('reviews')->insert([
            'item_id' => 8,
            'user_id' => 3,
            'rating' => 2,
            'detail' => 'Purchased last month. The build quality is top notch. Display is bright & clear.',
            'created_at' => \DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }
}
