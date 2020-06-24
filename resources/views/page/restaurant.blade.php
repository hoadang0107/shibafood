@extends('home')
@section('content')
<!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="../upload/restaurant/{{$resRef->picture}}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <img src="" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span>{{ $resRef->address }}</span>
                                    <h3>{{ $resRef->name }}</h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">説明</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">詳細</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">カスタマーレビュー ({{$countCmt}})</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>紹介</h5>
                                                <p>{{ $resRef->description }} </p>
                                            <div class="col-lg-5">
                                                <img src="img/product-single/tab-desc.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">お客様の評価</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">価格</td>
                                                <td>
                                                    <div class="p-price">{{ $resRef->price }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">住所</td>
                                                <td>
                                                    <div class="cart-add">{{ $resRef->address }}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">メニュー</td>
                                                <td>
                                                    <div class="p-stock">{{ $resRef->menu }}</div>
                                                </td>
                                                <tr>
                                                   <td class="p-catagory">電話番号</td>
                                                <td>
                                                    <div class="p-stock">{{ $resRef->phone }}</div>
                                                </td>
                                                </tr>

                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{$countCmt}} コメント</h4>

                                        <div class="comment-option">
                                        
                                            @foreach($all_cmt as $comment)

                                            <div class="co-item">
                                                
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>{{$user->name}} <span>{{$comment -> created_at}}</span></h5>
                                                    <div class="at-reply">{{$comment -> intent}}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="personal-rating">
                                            <h6>あなたの評価</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        
                                        @if (Auth::check()) 
                                            <div class="leave-comment">
                                            <h4>コメントを残す</h4>
                                            
                                            <form action="../comment/{{$resRef->id}}" class="comment-form" method="POST" role = "form">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                                @csrf    
                                                <div class="row">
                                                
                                                
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages" name="intent"></textarea>
                                                        <button type="submit" class="site-btn">メッセージを送る</button>
                                                    </div>
                                                </div>
                                            </form>                                            
                                            </div>
                                    
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
@endsection