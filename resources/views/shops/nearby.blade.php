@extends('layouts.app')

@section('content')
<div class="container">
<a href="/shops">Nearby Shops</a>
<a href="/preferred">My Preferred Shops</a>
    <div class="row">
    @foreach ($shops as $shop)
           <div class="col-md-3 col-sm-6">
                <div class="thumbnail">
                    <h4>{{$shop->name}}</h4>
                    <img src="{{$shop->picture}}" alt="{{$shop->name}}">
                    <div class="caption">
                        <p>
                            <a href="/dislike/{{$shop->id}}" class="btn btn-danger" role="button">Dislike</a> 
                            <a href="/like/{{$shop->id}}" class="btn btn-success" role="button">Like</a>
                        </p>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
</div>
@endsection
