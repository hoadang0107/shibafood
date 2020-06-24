@extends('home')
@section('content')

<div class="register-login-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<div class="register-form">
					<h2>User's Restaurant</h2>
					@foreach( $restaurant as $res)
					<div class="product-item">
						<div class="pi-pic">
							<img src="upload/restaurant/{{$res->picture}}" alt="" style="width: 300px; height: 300px; object-fit: contain"/>
							<div class="icon">
								<i class="icon_heart_alt"></i>
							</div>
							<ul>
								<li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
								<li class="quick-view"><a href="restaurant/{{$res->id}}">+ Quick View</a></li>
								<li class="w-icon"><a href="editRes/{{$res->id}}"><i class="fa fa-random"></i></a></li>
							</ul>
						</div>
						<div class="pi-text">
							<div class="catagory-name">{{$res->address}}</div>
							<a href="#">
								<h5>{{$res->name}}</h5>
							</a>
							<div class="product-price">
								rate: 3/5
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection