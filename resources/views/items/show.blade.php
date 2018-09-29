@extends('layouts.app')
@section('title')
    Items Show
@endsection

@section('content')
    <div>
        <div>
            <h1>{{$item->name}}</h1>
            <p>Price: {{$item->price}}</p>
            <p>Type: {{$item->type}}</p>
            <p>Manufacturer: {{$item->manufacturer->name}}</p>
            <p>Description: {{$item->description}}</p>
            <p><a href='/item/{{$item->id}}/edit'>Edit</a></p>
        </div>
        <div>
        <p>
            <form method="POST" action="/item/{{$item->id}}">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete" class="link">
            </form>
        </p>
        </div>
    </div>
    
    <div>
        <h2>Review</h2>
        @foreach ($reviews as $review)
            <div class="row no-gutters text-left product-review">
                    <div class="col-6 col-md-2 list-unstyled">
                        <li><a href='#'>{{$review->name}}</a></li>
                    </div>
                    <div class="col-12 col-sm-10 col-md-10 list-unstyled">
                        <li class="rating">Rating: {{$review -> pivot -> rating}} of 5</li>
                        <li class='date'>Date: {{$review -> pivot -> created_at}}</li>
                        <li class='detail'>Review detail: {{$review -> pivot -> detail}}</li>
                        <li><a href="/review/{{$review -> pivot -> id}}/edit">Edit review</a></li>

                    </div>
             
    </div>
        @endforeach
        
        {{ $reviews->links()}}
        
        
    <li><a href="/review/create">Create a new review</a></li>

@endsection