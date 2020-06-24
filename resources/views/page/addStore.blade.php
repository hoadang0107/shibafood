@extends('home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="register-form">
                <h2 style="padding-top: 10px;">レストランを追加</h2>
                <form method="POST" action="addRes" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="group-input">
                        <label for="name_f">レストランの名 *</label>
                        <input type="text" name="name" id="name_f" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" required/>
                    </div>
                    <div class="group-input">
                        <label for="address">レストランの住所 *</label>
                        <input type="text" id="address" name="address"  required autofocus>
                    </div>
                    <div class="group-input">
                        <label for="phone">電話 </label>
                        <input type="text" id="phone" name="phone"  />
                    </div>
                    
                    <div class="group-input">
                        <label for="address">メニュー *</label>
                        <input type="text" id="menu" name="menu"  required autofocus>
                    </div>
                    <div class="group-input">
                        <label for="address">価格</label>
                        <input type="text" id="price" name="price"  required autofocus>
                    </div>
                    <div class="group-input" >
                        <label for="mota">前書き</label>
                    </div>
                    <div class="group-input" >
                        <textarea  id="Description" name="description" style="width: 100%; height: 100px"></textarea>
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
                    <button type="submit" class="site-btn register-btn" style="margin-top: 20px; margin-bottom: 20px">ADD</button>
                </form>
            
            </div>
        </div>
    </div>
</div>
<script src="../resources/js/jquery.min.js"></script>
<script src="../resources/js/signup.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection
