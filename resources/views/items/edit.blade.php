@extends('layouts.app')
@section('title')
    Edit Items
@endsection

@section('content')
    <form method="POST" action="/item/{{$item->id}}">
    {{csrf_field()}}
    {{ method_field('PUT') }}
    <p><label>Name</label></p>
    <input type="text" name="name" value="{{$item->name}}"></p>
    <p><label>Price</label>
    <input type="text" name="price" value="{{$item->id}}"><br></p>
    <p><label>Type</label>
    <input type="text" name="type" value="{{$item->type}}"><br></p>
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
@endsection