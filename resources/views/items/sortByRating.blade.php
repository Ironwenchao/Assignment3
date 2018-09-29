@extends('layouts.app')

@section('title')
    All products
@endsection

<!--all products list here-->
@section('content')
    <!--Site location navigation-->

    <h2 style = 'color:black;'>The Items sort by average Rating</h2>
    <div class="col-12 container">
      @foreach ($items as $item)
        
            
            <div class="shadow mb-2 bg-white rounded items row">
              <!--<div class="col-md-2 d-none d-md-block py-2">-->
              <!--  <img src="{{ asset('images/iphonexs.png') }}" alt="iphonexs" class="product-pics-thumbnail">-->
              <!--</div>-->
              <div class="col-sm-12 col-md-10 details">
                <ul class="list-unstyled">
                    <li class="list-item col-md py-2"><a href="{{url("item/$item->id")}}">{{ $item->name }}</a></li>

                    <!--If there is no rating, shows no rating-->
                    @if ($item->AvgRating == null)
                      <li class="list-item col-md py-2"> Rating: <strong>No Rating</strong></li>
                    @else
                      <li class="list-item col-md py-2"> Rating: {{$item->AvgRating}}<strong></strong> from <a href="{{url("item/$item->id")}}#review">{{$item->numberOfReview}} reviews</a></li>
                    @endif
                    <li class="list-item col-md py-2 item-description"><p>{{ $item->description }}</p></li>
                </ul>
              </div>
              
            </div>
          
      @endforeach

      
    </div>
    
    
@endsection