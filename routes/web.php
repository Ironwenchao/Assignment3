<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Item;
use App\Manufacturer;
use App\User;

Route::resource('item', 'ItemController');
Route::resource('review', 'ReviewController');

Route::get('/', function () {
    return view('home');
});


Route::get('/test', function () {
    
    
    /*$item = Item::where('price', '>', 2000)->get();*/
    
    /*$count = Item::where('price', '>', 2000)->first();
    dd($count);*/
    
    /*$itmes = Item::orderBy('price', 'asc')->get();*/
    
    /*$itme = Item::find(10); $itme->price = 300; $itme->save();
    dd($itme);*/
    
    /*$manufacturers = App\Manufacturer::find(1)->items;
    dd($manufacturers);*/
    /*dd(Item::find(1)->manufacturer);*/
});

/*Route::get('/test',function() {
    /*$user = User::find(1);
    //$items = $user->items;
    // dd($items);
    
    $name = 'Apple';
    $items = $user->items()->whereRaw('name like ?',
                    array("%$name%"))->get();
    dd($items);*/
    
    /*$name = 'Apple';
    
    $items = Item::whereHas('manufacturer', function($query)use($name){
        return $query->whereRaw('name like ?',array("%$name%"));
    })->get();
    dd($items);
});*/
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')    
    ->name('home');
    
Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');


Route::get('/sortbyreviews', 'ItemController@numberOfReviewsDESC');
Route::get('/sortbyrating', 'ItemController@avgRatingDESC');
Route::get('/sortByDate', 'ItemController@dateOfReviewsDESC');
