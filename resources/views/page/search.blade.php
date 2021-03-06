@extends('home')
@section('content')
<div class="product-slider owl-carousel">
    @foreach( $restaurant as $restaurant)
    @if ($restaurant->duyet)
    <div class="product-item">
        <div class="pi-pic">
            <img src="upload/restaurant/{{$restaurant->picture}}" style="width: 230px; height: 230px; object-fit: contain"/>
            <div class="icon">
                <i class="icon_heart_alt"></i>
            </div>
            <ul>
                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                <li class="quick-view"><a href="restaurant/{{$restaurant->id}}">+ クイックビュー</a></li>
                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
            </ul>
        </div>
        <div class="pi-text">
            <div class="catagory-name">{{$restaurant->address}}</div>
            <a href="#">
                <h5>{{$restaurant->name}}</h5>
            </a>
            <div class="product-price">
                rate: 3/5
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection