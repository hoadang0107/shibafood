@extends('home')
@section('content')
<div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>サインアップ</h2>
                        <form method="POST" action="signup" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
							<div class="group-input">
								<label for="name">ユーザの名前</label>
								<input type="text" name="name" id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required/>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
							</div>
                            <div class="group-input">
                                <label for="email">電子メールアドレス *</label>
                                <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="group-input">
                                <label for="password">パスワード *</label>
                                <input type="password" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="group-input">
                                <label for="con-pass">パスワードを認証する *</label>
                                <input type="password" id="con-pass" name="passwordAgain"  class="form-control{{ $errors->has('passwordAgain') ? ' is-invalid' : '' }}"  required>
                                @if ($errors->has('passwordAgain'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('passwordAgain') }}</strong>
                                </span>
                                @endif
							</div>
							
                            <div class="group-input">
                                <input type="file" id="img_up" name="avatar" style="display: none"/>
                                <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                                <p id="Up_img" style="cursor: pointer;">アバターをアップロード</p>
                                @if ($errors->has('file'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                                @endif
                            </div>


                            @if(session('thongbao'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{session('thongbao')}}</strong>
                                </span>
                            
                            @endif

                            <button type="submit" class="site-btn register-btn">登録</button>
                        </form>
                        <div class="switch-login">
                            <a href="login" class="or-login">またはログイン</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="../resources/js/jquery.min.js"></script>
<script src="../resources/js/signup.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection