@extends('layouts.app')

@section('content')
<div class="container">
<a href="/nearby">Nearby Shops</a>
<a href="/preferred">My Preferred Shops</a>
    <div class="row">
    @foreach ($shops as $shop)
           <div class="col-md-3 col-sm-6">
                <div class="thumbnail">
                    <h4>{{$shop->name}}</h4>
                    <img src="{{$shop->picture}}" alt="{{$shop->name}}">
                    <div class="caption">
                        <p>
                            <a href="#" class="btn btn-danger" role="button">Dislike</a> 
                            <a href="#" class="btn btn-success" role="button">Like</a>
                        </p>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
</div>
@endsection
