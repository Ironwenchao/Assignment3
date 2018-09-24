<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use App\Manufacturer;
use App\Country;
use App\Review;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items = Item::all();
        $manufacturers = Manufacturer::all();
        // dd($products);
        return view('reviews.create', ['items'=> $items, 'manufacturers' => $manufacturers]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            "rating" => "required | integer| min:0| max:5",
            "detail" => "required | max:1000",
            "date" => "required | date",
        ]);
        
        $review = new Review();
        $review->item_id = $request->item;
        $review->user_id = $request->user;
        $review->rating = $request->detail;
        $review->detail = $request->detail;
        $review->date = $request->date;
        $review->save();
        return redirect("/item/$item_id");
        
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*$review = Review::find($id);
        $product = $review->products;
        $author = $review->user_id;*/
        
        $review= Review::find($id);
        return view('reviews.edit') -> with('review', $review) -> with('manufacturers', Manufacturer::all()) -> with('item',$item);
        /*$eligibleUsers = (Auth::check() && Auth::user()->isAdmin() | (Auth::check() && (Auth::user()->id == $author)));
        //Only admin can edit all review and only the authors can edit their own reviews but guests and other users can't
        if(!$eligibleUsers) {
            echo "<h2 style='color:blue;'>You don't have right to edit the product. Redirect to home page in 5 seconds......</h2>";
            header( "refresh:5;url=/product/$product->id" );
        } elseif($eligibleUsers) {
            
            return view('reviews.edit_form', ['review' => $review, 'product' => $product]);
        }*/
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
        //
        
        $this->validate($request,[
            "rating" => "required | integer| min:0| max:5",
            "detail" => "required | max:1000",
            "date" => "required | date",
        ]);
        
        $review = new Review();
        $review->item_id = $request->item;
        $review->user_id = $request->user;
        $review->rating = $request->detail;
        $review->detail = $request->detail;
        $review->date = $request->date;
        $review->save();
        return redirect("/item/$item_id");
        
        // dd($product_id);
        
        //if administrator edits the review, the author is still the original author instead of administrator name
        if(Auth::user()->isAdmin()) {
            $user_id = $review->user_id;
        } else {
            $review->user_id = $user_id;
        }
        
        $review->save();
        return redirect("/product/$product_id");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);    
        $review->delete();
        return redirect ('/item');
    }
}