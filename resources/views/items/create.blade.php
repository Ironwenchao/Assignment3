@extends('layouts.app')
@section('title')
    Create Items
@endsection

@section('content')
    <h1>Create a new Item</h1>
    @if (count($errors) > 0)
    <div class="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
         @endforeach
       </ul>
    </div>
    @endif
    
    
    <form method="POST" action="/item">
    {{csrf_field()}}
    <p><label>Name: </label><input type="text" name="name" value="{{old('name')}}"></p>
    <p><label>Price: </label><input type="text" name="price" value="{{old('price')}}"></p>
    <p><label>Type: </label><input type="text" name="type" value="{{old('type')}}"></p>
    <p><label>Description: </label><input type="text" name="description" value="{{old('description')}}"></p>
    <p><select name="manufacturer">
        @foreach ($manufacturers as $manufacturer)
            @if($manufacturer->id == old('manufacturer'))
                <option value="{{$manufacturer->id}}" selected="selected">{{$manufacturer->name}}</option>
            @else
                <option value="{{$manufacturer->id}}">{{$manufacturer->name}}</option>
            @endif
        @endforeach
    </select></p>
    <input type="submit" value="Create"> </form>
@endsection