@extends('home')
@section('content')
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2>ユーザのプロフィール</h2>
                    <form method="POST" action="profile" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                        <div class="group-input">
                            <input type="file" id="img_up" name="avatar" style="display: none"/>
                            <img src="upload/user/{{$user->avatar}}" class="avatar img-circle img-thumbnail"  alt="avatar">
                            <p id="Up_img" style="cursor: pointer;">アバターをアップロード</p>
                            @if ($errors->has('file'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="group-input">
                            <label for="name">ユーザー名</label>
                            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required/>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="group-input">
                            <label for="email">電子メールアドレス *</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{$user->email}}" disabled />
                            
                        </div>

                        <div class="form-group">
                            <input type="checkbox" name="changePassword" id="changePassword" value="on">
                            <label>パスワードを変更する</label>
                            <input type="password" class="password form-control" name="password" disabled/>

                        </div>
                        <div class="form-group">
                            <label>パスワードを認証する</label>
                            <input type="password" class="password form-control" name="passwordAgain" disabled/>
                        </div>

                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                            {{$err}}<br>
                            @endforeach
                        </div>
                        @endif


                        @if(session('thongbao'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{session('thongbao')}}</strong>
                        </span>
                        
                        @endif

                        <button type="submit" class="site-btn register-btn">保存する</button>
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
<script>
    $(document).ready(function () {
        $("#changePassword").change(function () {
            if ($(this).is(":checked")) {
                $(".password").removeAttr("disabled");
            } else {
                $(".password").attr("disabled", '');
            }
        });

    });
</script>
@endsection

