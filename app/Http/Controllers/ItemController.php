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
        /*$reivew = Review::all();
        $items = Item::with('review')->get();
        $items = DB::table('items')
                            ->selectRaw('items.*,count(reviews.id)as numberOfReview,avg(reviews.rating) as AvgRating, reviews.item_id')
                            ->leftJoin('reviews', 'items.id', '=', 'reviews.item_id')
                            ->groupBy('items.id')
                            ->get();*/
        $items = Item::selectRaw('items.*,count(reviews.id)as numberOfReview,avg(reviews.rating) as AvgRating, reviews.item_id, reviews.detail,reviews.date')
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'manufacturer' => 'exists:manufacturers,id',
            'name' => 'required|max:255',
            'price' => 'required|numeric|min:0',
            'type' => 'required|max:50',
            'description' => 'required|max:255'
            ]);
        
        $item = new Item();
        $item->manufacturer_id = $request->manufacturer;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->type = $request->type;
        $item->description = $request->description;
        $item->save();
        return redirect("/item/$item->id");
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        // $review = Review::where('item_id', '=', $id)->get();
        $reviews = $item->users()->get();
        // dd($review);
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
}

