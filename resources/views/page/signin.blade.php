@extends('home')
@section('content')
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>Login</h2>
                    <form method="POST" action="login">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="group-input">
                            <label for="username">Email address *</label>
                            <input type="email" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="group-input">
                            <label for="pass">Password *</label>
                            <input type="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Save Password
                                    <input type="checkbox" id="save-pass">
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass">Forget your Password</a>
                            </div>
                        </div>
                        @if(session('thongbao'))
                        <div class="alert alert-danger">
                           {{session('thongbao')}}
                       </div>
                       @endif
                       <button type="submit" class="site-btn login-btn">Sign In</button>
                   </form>
                   <div class="switch-login">
                    <a href="signup" class="or-login">Or Create An Account</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection