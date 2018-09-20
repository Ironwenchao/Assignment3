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
use App\Users;

Route::resource('item', 'ItemController');

Route::get('/', function () {
    return view('home');
});


Route::get('/test', function () {
    /*$item = new Item;
    $item->name = 'ipod';
    $item->price = 19.99;
    $item->type = 'mobile phone';
    $item->description = 'this is a good device!';
    $item->save(); // save to products table
    $id = $item->id; // retrieve the id of the newly created product object
    dd($id);*/
    
    /*$item = Item::create(array('name' => 'Playstation', 'price' => 450, 'type' => 'game device', 'description' => 'this is a good game device!'));
    dd($item);*/
    
    /*$item = Item::all();
    dd($item);*/
    
    
    /*$items = Item::all();
    foreach ($items as $item) {
        echo $item -> name;
    }*/
    
    /*$item = Item::find(1);*/
    
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
