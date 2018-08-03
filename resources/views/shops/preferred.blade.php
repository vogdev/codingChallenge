@extends('layouts.app')

@section('content')
<div class="container">
    <div class="links">
        <a href="/preferred" class="link-active">My Preferred Shops</a>
        <a href="/shops">Nearby Shops</a>
    </div>
    <preferred-shops-component :preferred="{{$preferredShops}}"></preferred-shops-component>
</div>
@endsection
