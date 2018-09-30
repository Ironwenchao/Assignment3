<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Item;
use App\Manufacturer;
use App\Review;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['show']]);
    }
    
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
        ]);
        
        /*$existing = Review::where('user_id', '=', Auth::user()->id)->where('item_id', '=', $request->item_id) ->exists();
        
        // use reviews() in User model, if the current users has not given a review for the product, it will create a review
        if (!$existing) {
            Auth::user()->reviews()->create([
                'detail' => $request['detail'],
                'rating' => $request['rating'],
                'item_id' => $request['item_id'],
            ]);
        
        } else {
            session()->flash('warning', 'You have reviewed this before');
        }
    
        //get current product id
        $item_id = $request->item_id;
        return redirect("/item/$item_id");        
    }*/
        
        //$user_id = Auth::user()->id; /*this is call the current user who has logined
        $user_id = Auth::id();
        $review = new Review();
        $item_id = $review->item_id = $request->item;
        $review->user_id = $user_id;
        $review->rating = $request->rating;
        $review->detail = $request->detail;
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
        $items = $review->item;
        // dd($items->id);
        // $items = $review->item()->get();
        $author = $review->user_id;
        $eligibleUsers = (Auth::check() && Auth::user()->isAdmin() | (Auth::check() && (Auth::user()->id == $author)));
        //Only admin can edit all review and only the authors can edit their own reviews but guests and other users can't
        if(!$eligibleUsers) {
            echo "<h2 style='color:red;'>Sorry! You cannot edit review. The page will back to the Item list in 5 seconds!</h2>";
            header( "refresh:5;url=/item/$items->id" );
        } elseif($eligibleUsers) {
            
        return view('reviews.edit') -> with('review', $review) -> with('items',$items);
        }
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
        ]);
        
        $user_id = Auth::user()->id; /*this is call the current user who has logined*/

        
        $review = Review::find($id);
        $review->user_id = $user_id;
        $review->rating = $request->rating;
        $review->detail = $request->detail;
        $item = $review->item_id;
        $review->save();
        return redirect("/item/$item");

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
    
    public function dateOfReviewsDESC() {
        /*
            Select product, count number product and calculate avergae of rating, order by number of reviews in descending order
        */
        
        $reviews = Review::selectRaw('reviews.*, count(reviews.id) as numberOfReview, avg(reviews.rating) as AvgRating, reviews.item_id, reviews.created_at')
                          ->leftJoin('reviews', 'items.id', '=', 'reviews.item_id')
                          ->groupBy('reviews.id')
                          ->orderBy('reviews.created_at', 'desc')
                          ->get();
        
        // $products = Product::all();
        
        return view('items.sortByDate', ['reviews' => $reviews]);
        
    }
}