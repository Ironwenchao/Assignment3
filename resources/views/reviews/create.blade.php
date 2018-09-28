@extends('layouts.app')
@section('title')
    Create Reviews
@endsection

@section('content')
    <h1>Create a new Review</h1>
    @if (count($errors) > 0)
    <div class="alert">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
         @endforeach
       </ul>
    </div>
    @endif
    
    <form method="POST" action="/review"> 
    {{csrf_field()}}
    <p><label>Rating: </label><input type="text" name="rating" value="{{old('rating')}}"></p>
    <p>Detail: </p>
    <p><textarea name="detail" rows=6 cols=30 >{{old('detail')}}</textarea><br></p>

    <!--<p><label>detail: </label><input type="text" name="detail" value="{{old('detail')}}"></p>-->
    <!--<p><label>date: </label><input type="text" name="date" value="{{old('date')}}"></p>-->
    <p><select name="item">
        @foreach ($items as $item)
            @if($item->id == old('item'))
                <option value="{{$item->id}}" selected="selected">{{$item->name}}</option>
            @else
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endif
        @endforeach
    </select></p>
    
    
    
    <input type="submit" value="Create"> </form>
@endsection