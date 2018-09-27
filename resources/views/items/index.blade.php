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

<a href="/item/create">Create a new item</a><br>
<li><a href="/review/create">Create a new review</a></li>

    <div>
        @foreach ($items as $item)
                <div>
                  <div>
                    <ul class="list-unstyled">
                        <li><a href="{{url("item/$item->id")}}">{{ $item->item_name }}</a></li>
                        <!--If there is no rating, shows no rating-->
                        <li><p>{{ $item->item_detail}}</p></li>
                    </ul>
                  </div>
                </div>
        @endforeach
    </div>
@endsection