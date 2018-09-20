@extends('layouts.app')
@section('title')
    Items Show
@endsection

@section('content')
    <h1>{{$item->name}}</h1>
    <p>Price: {{$item->price}}</p>
    <p>Type: {{$item->type}}</p>
    <p>Manufacturer: {{$item->manufacturer->name}}</p>
    <p>{{$item->description}}</p>
    <p><a href='/item/{{$item->id}}/edit'>Edit</a></p>
    <p>
        <form method="POST" action="/item/{{$item->id}}">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
        <input type="submit" value="Delete" class="link">
        </form>
    </p>
@endsection