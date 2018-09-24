@extends('layouts.app')
@section('title')
    Edit Items
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
        <form method="POST" action="/item/{{$item->id}}">
        {{csrf_field()}}
        {{ method_field('PUT') }}
            <div class="col-3">
                <p><label>Name</label></p>
                <input type="text" name="name" value="{{$item->name}}"></p>
            </div>
            <div class="col-6">
                <p><label>Price</label>
                <input type="text" name="price" value="{{$item->id}}"><br></p>
            </div>
            <div class="col-9">
                <p><label>Type</label>
                <input type="text" name="type" value="{{$item->type}}"><br></p>
            </div>
        <p><label>Description</label>
        <input type="text" name="description" value="{{$item->description}}"><br></p>
        <p><select name="manufacturer">
        @foreach ($manufacturers as $manufacturer)
            @if($manufacturer->id === $item->manufacturer_id)
            <option value="{{$manufacturer->id}}" selected="selected">{{$manufacturer->name}}</option>
            @else
            <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
            @endif
        @endforeach
        </select>
        <input type="submit" value="Update">
        </form>
        </div>
    </div>
@endsection