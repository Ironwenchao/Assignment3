<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Manufacturer;
use App\Review;
use App\User;

class ItemController extends Controller
{
    public function __construct() {
         $this->middleware('auth', ['except'=>['index','show']]);
         
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        $items = Item::selectRaw('items.*,count(reviews.id)as numberOfReview,avg(reviews.rating) as AvgRating, reviews.item_id, reviews.detail')
                            ->leftJoin('reviews', 'items.id', '=', 'reviews.item_id')
                            ->groupBy('items.id')
                            ->get();
        // dd($items); 
        
        return view('items.index')->with('items', $items);
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create')->with('manufacturers', Manufacturer::all());
    }
    
    
    // $image_store = request()->file('image')->store(‘products_images', 'public');

    public function store(Request $request)
    {
        $this->validate($request,[
            'manufacturer' => 'exists:manufacturers,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|max:50',
            'description' => 'required|max:255',
            // 'image'=> 'required'
            ]);
        
        $image_store = request()->file('image')->store('item_images', 'public');
        $item = new Item();
        $item->manufacturer_id = $request->manufacturer;
        $item->image = $image_store;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->type = $request->type;
        $item->description = $request->description;
        $item->save();
        return redirect("/item/$item->id");
    }
    
    

    public function show($id)
    {
        $item = Item::find($id);
        // $review = Review::where('item_id', '=', $id)->get();
        // $reviews = $item->users()->get();
        // dd($review);
        $reviews = $item->users()->orderBy('pivot_created_at', 'desc')->paginate(5);
        // $reviews = $item->DB::table('reviews')->orderBy('pivot_created_at','desc')->paginate(5);
        // dd($reviews);
        //dd($item);
        return view('items.show',['item'=> $item, 'reviews' => $reviews]);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('items.edit') -> with('item', $item) -> with('manufacturers', Manufacturer::all());
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     
        
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'manufacturer' => 'exists:manufacturers,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|max:50',
            'description' => 'required|max:255'
            ]);
        
        $item = Item::find($id);
        $item->manufacturer_id = $request->manufacturer;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->type = $request->type;
        $item->description = $request->description;
        $item->save();
        return redirect("/item/$item->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);    
        $item->delete();
        return redirect ('/item');
    }
    
    
    public function numberOfReviewsDESC() {
        /*
            Select product, count number product and calculate avergae of rating, order by number of reviews in descending order
        */
        
        $items = Item::selectRaw('items.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.item_id')
                          ->leftJoin('reviews', 'items.id', '=', 'reviews.item_id')
                          ->groupBy('items.id')
                          ->orderBy('numberOfReview', 'desc')
                          ->get();
        
        // $products = Product::all();
        
        return view('items.sortByReview', ['items' => $items]);
        
    }
    
    
    
    public function avgRatingDESC() {
        /*
            Select product, count number product and calculate avergae of rating, order by number of reviews in descending order
        */
        
        $items = Item::selectRaw('items.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.item_id')
                          ->leftJoin('reviews', 'items.id', '=', 'reviews.item_id')
                          ->groupBy('items.id')
                          ->orderBy('AvgRating', 'desc')
                          ->get();
        
        
        return view('items.sortByRating', ['items' => $items]);
    }
    
    
    
        public function dateOfReviewsDESC() {
        /*
            Select product, count number product and calculate avergae of rating, order by number of reviews in descending order
        */
        
        $reviews = Review::selectRaw('reviews.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.item_id, reviews.created_at')
                          /*->leftJoin('reviews', 'items.id', '=', 'reviews.item_id')*/
                          ->groupBy('reviews.id')
                          ->orderBy('reviews.created_at', 'desc')
                          ->get();
        
        // $products = Product::all();
        
        return view('reviews.sortByDate', ['reviews' => $reviews]);
        }
}



