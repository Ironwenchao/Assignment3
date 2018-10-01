@extends('layouts.app')
@section('title')
    Edit {{$items -> item_name}} Review
@endsection

@section('content')
        <h2>Update {{$items -> name}} Review</h2>
            <div class="container">
            <div class="row">  
            <form method="POST" action="/review/{{$review->id}}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="rating" class="control-label">rating</label>
                            <input id="rating" type="rating" class="form-control" name="rating" value="{{$review->rating, old('rating') }}">
                            @if ($errors->has('rating'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rating') }}</strong>
                                </span>
                            @endif
                    </div>
    
                    <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                        <label for="detail" class="control-label">detail</label>
    
                            <textarea id="detail" rows="3" type="detail" class="form-control" name="detail" autofocus>{{$review->detail, old('detail') }}</textarea>
    
                            @if ($errors->has('detail'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('detail') }}</strong>
                                </span>
                            @endif
                    </div>
    
                    
    
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn bg btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </form>
@endsection                