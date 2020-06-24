
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
                            <div>                         
                                <label style="font-size: 18px; font-weight: 70%;">住所: {{$resRef->address}}</label>
                            </div> 
                            <div>
                                <label style="font-size: 18px; font-weight: 70%;">電話番号: {{$resRef->phone}}</label>
                            </div> 
                            <div>
                                <label style="font-size: 18px; font-weight: 70%;">メニュー: {{$resRef->menu}}</label>
                            </div> 
                            <label style="font-size: 18px; font-weight: 70%;">価格: {{$resRef->price}}</label>
                            <div>
                                <label style="font-size: 17px; font-weight: 70%;">Introduction: {{$resRef->description}}</label>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="product-tab">
                    <div class="tab-item">
                        <ul class="nav" role="tablist">
                            <li>
                                <a data-toggle="tab" href="#tab-2" role="tab">口コミ投稿</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab-3" role="tab">口コミ一覧 ({{$countCmt}})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                <?php $isLoggedIn = \Illuminate\Support\Facades\Auth::check(); ?>
                                @if(!$isLoggedIn)
                                <p>レビューする前に
                                    <a href="{{url('login')}}">サインイン</a>
                                    してください。
                                </p>
                                @else
                                <form method="POST" action="{{$resRef->id}}/comment"  enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="file" id="img_up" name="avatar" style="display: none"/>
                                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                                    <p id="Up_img" style="cursor: pointer;">写真アップ</p>
                                    @if ($errors->has('file'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                    @endif
                                    <div class="group-input">
                                        <label>評価</label>
                                        <input input type="number" min="0" step="1" name="rating" max="5" required autofocus>
                                    </div>
                                    <div class="group-input" >
                                        <textarea  id="intent" name="intent" style="width: 100%; height: 100px">

                                        </textarea>
                                    </div>
                                    <button type="submit" class="site-btn">投稿</button>
                                </form>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option">
                                    <h4>{{$countCmt}} 口コミ</h4>

                                    <div class="comment-option">

                                        @foreach($resRef->comment as $comment)


                                        <div class="co-item">

                                            <div class="avatar-text">

                                                <div class="at-rating">
                                                    <h5>{{$comment->user->name}} <span>{{$comment->created_at}}</span>

                                                    </h5>
                                                    <label style="font-style: 20px">{{$comment->rate}}</label>
                                                    <i class="fa fa-star"></i>

                                                </div>
                                                <div>><img src="../upload/comment/{{$comment->picture}}" style="width: 400px; height: 300px; object-fit: contain">
                                                </div>
                                                
                                                <div class="at-reply"><label style="font-size: 20px">{{$comment->intent}}</label></div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>


                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../resources/js/jquery.min.js"></script>
    <script src="../../resources/js/signup.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</section>
<!-- Product Shop Section End -->
@endsection