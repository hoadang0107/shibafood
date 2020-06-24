<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="ht-left">
                <div class="mail-service">
                    <i class=" fa fa-envelope"></i>
                    ShibaFood@gmail.com
                </div>
                <div class="phone-service">
                    <i class=" fa fa-phone"></i>
                    +88 66 88 66
                </div>
            </div>
            <div class="ht-right">

                    @if(Auth::check())
                    <li><a href="{{url('profile')}}" class="login-panel"><i class="fa fa-user"></i>{{Auth::user()->name}}</a>
                    @else
                    <li><a href="{{url('login')}}" class="login-panel"><i class="fa fa-user"></i>ログイン</a>
                    @endif
                    
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width:300px;">
                            <option value='yu' data-image="../fashi/img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Japanese">日本語 </option>
                            <option value='yt' data-image="../fashi/img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">English</option>


                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="{{url('home')}}">
                                <img src="../fashi/img/logo_shiba.png" style="height: 50px; weight: 50px;" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7" >
                        <form role="search" method="get" id="searchform" action="{{route('search')}}">
                                <input type="text" name="key" placeholder="店舗の名を入力してください" style="width: 500px"/>
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>    
                        </div>

                    </div>

            
 </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{url('home')}}">ホーム</a></li>
                        <li><a href="./contact.html">コンタクト</a></li>
                        <li><a href="#">ページ</a>
                            <ul class="dropdown">
                                @if(Auth::check())
                                <li><a href="{{url('profile')}}">ユーザのプロフィール</a></li>
                                <li><a href="{{url('listRestaurant')}}">ユーザの店舗</a></li>
                                <li><a href="{{url('addRes')}}">店舗登録</a></li>
                                <li><a href="{{url('logout')}}">ログアウト</a></li>    
                                @else                
                                <li><a href="{{url('signup')}}">サインアップ</a></li>
                                <li><a href="{{url('login')}}">ログイン</a></li>
                                @endif
                            </ul>
                        </nav>
                        <div id="mobile-menu-wrap"></div>
                    </div>
                </div>
            </header>