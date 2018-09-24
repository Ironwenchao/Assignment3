@extends('layouts.app')
@section('title')
    Edit Reviews
@endsection

@section('content')
    
    <h1> Edit Item</h1>
    @if (count($errors) > 0)
    <div class="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
         @endforeach
       </ul>
    </div>
    @endif
    <div class="container">
        <div class="row">
        <form method="POST" action="/review/{{$review->id}}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
            <div class="col-3">
                <p><label>Rating</label></p>
                <input type="text" name="name" value="{{$review->rating}}"></p>
            </div>
            <div class="col-6">
                <p><label>Detail</label>
                <input type="text" name="price" value="{{$review->detail}}"><br></p>
            </div>
            <div class="col-9">
                <p><label>Date</label>
                <input type="text" name="type" value="{{$review->date}}"><br></p>
            </div>
        
        <p><select name="item">
        @foreach ($items as $item)
            @if($item->id === $review->item_id)
            <option value="{{$item->id}}" selected="selected">{{$item->name}}</option>
            @else
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
        @endforeach
        </select>
        <input type="submit" value="Update">
        </form>
        </div>
    </div>
@endsection