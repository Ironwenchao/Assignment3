@extends('layouts.app')
@section('title')
    Items
@endsection
@section('content')
<h1>Item List</h1>

@if(Auth::check() && Auth::user()->name == 'Moderator')
    <a href="/item/create">Create a new item</a><br>
@endif

    <div>
        @foreach ($items as $item)
                <div>
                  <div>
                    <ul class="list-unstyled">
                        <li><a href="{{url("item/$item->id")}}">{{ $item->name }}</a></li>
                        <!--If there is no rating, shows no rating-->
                        <li><p>{{ $item->description}}</p></li>
                    </ul>
                  </div>
                </div>
        @endforeach
    </div>

@endsection