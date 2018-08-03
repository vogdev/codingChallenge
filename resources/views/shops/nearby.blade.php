@extends('layouts.app')

@section('content')
<div class="container">
    <div class="links">
        <a href="/shops" class="link-active">Nearby Shops</a>
        /
        <a href="/preferred">My Preferred Shops</a>
    </div>
    <shops-component :shops="{{$shops}}"></shops-component>
</div>
@endsection
