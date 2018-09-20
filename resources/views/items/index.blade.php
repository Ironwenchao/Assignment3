@extends('layouts.app')
@section('title')
    Items
@endsection
@section('content')
<h1>Item List</h1>
<ul>
    @foreach ($items as $item)
        <a href="/item/{{$item->id}}"><li>{{ $item->name }}</li></a>
    @endforeach
</ul>

<a href="/item/create">Add a new item</a>
@endsection