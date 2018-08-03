@extends('layouts.app')

@section('content')
<div class="container">
<a href="/shops">Nearby Shops</a>
<a href="/preferred">My Preferred Shops</a>
    <shops-component :shops="{{$shops}}"></shops-component>
</div>
@endsection
