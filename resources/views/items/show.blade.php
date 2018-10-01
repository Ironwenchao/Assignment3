@extends('layouts.app')
@section('title')
    Items Show
@endsection


@section('content')
    <div>
        <div>
            <h1>{{$item->name}}</h1>
            <img src="/storage/{{$item->image}}" alt="item image" style="width:150px;height:150px;">
            <p>Price: {{$item->price}}</p>
            <p>Type: {{$item->type}}</p>
            <p>Manufacturer: {{$item->manufacturer->name}}</p>
            <p>Description: {{$item->description}}</p>
        </div>
         @if(Auth::check() && Auth::user()->name == 'Moderator')
            <div>
            <p>
                <p><a href='/item/{{$item->id}}/edit'>Edit</a></p>
                <form method="POST" action="/item/{{$item->id}}">
                {{csrf_field()}}
                {{ method_field('DELETE') }}
                <input type="submit" value="Delete" class="link">
                </form>
            </p>
            </div>
        @elseif(Auth::check() && Auth::user())
            <div class="text-left">
                <li><a href="/review/create">Create a new review</a></li>            
            </div>
        @endif
    </div>
    
    <div>
        <h2>Review</h2>
            <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sort By
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="/item/{{$item->id}}/showMostRecentReviwed">Review Order By Date</a><br>
                    <a class="dropdown-item" href="/item/{{$item->id}}/showByTheHighestRating">Review Order By Rating</a>
                  </div>
            </div>
            
        
        
        @foreach ($reviews as $review)
            <div class="row no-gutters text-left product-review">
                    <div class="col-6 col-md-2 list-unstyled">
                        <li><a href='#'>{{$review->name}}</a></li>
                    </div>
                    <div class="col-12 col-sm-10 col-md-10 list-unstyled">
                        <li class="rating">Rating: {{$review -> pivot -> rating}} of 5</li>
                        <li class='date'>Date: {{$review -> pivot -> created_at}}</li>
                        <li class='detail'>Review detail: {{$review -> pivot -> detail}}</li>
                        <div>
                            @if((Auth::check() && Auth::user()->name == 'Moderator') | (Auth::check() && Auth::user()->id == $review -> pivot -> user_id))
                                <div><p>
                                    <a href="/review/{{$review -> pivot -> id}}/edit">Edit review</a>
                                    <form method="POST" action="/review/{{$review -> pivot -> id}}">
                                    {{csrf_field()}}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" value="Delete" class="link">
                                    </form>
                                </p></div>
                            @endif
                        </div>
                    </div>
    </div>
        @endforeach
        
        {{ $reviews->links()}}
        
        

@endsection