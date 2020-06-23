@extends('home')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="profile">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">                            
                                <div class="image-container">
                                    <img src="{{$user1->avatar}}" id="imgProfile" class="img-circle img-thumbnail" style="width: 100px; height: 100px; object-fit: contain"alt="avatar">
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display: none;" id="profilePicture" name="avatar" />
                                    </div>
                                </div>
                                <div class="userData ml-3">
                                    <h3>{{$user1->name}}</h3>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">Basic Info</a>
                                    </li>

                                </ul>

                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">User Name</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                
                                                <div class="group-input">
                                                    <input type="text" name="name" id="name" class="form-control" value="{{$user1->name}}" />

                                                </div>
                                            </div>


                                        </div>
                                        <hr />


                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Email</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <input type="email" class="form-control" name="email" value="{{$user1->email}}" disabled/>
                                                
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row edit_profile">
                                            <div class="col-sm-3 col-md-2 col-5">
                                            <label style="font-weight:bold;">Đổi mật khẩu</label>
                                            </div>
                                            <hr />
                                        </div>

                                        <div class="row edit_profile" >
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">New Password</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <div class="group-input edit_profile">
                                                    <input type="password" value="" id="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  required>
                                                    @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr />
                                        </div>

                                        <div class="row edit_profile">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Confirm New Password</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <div class="group-input edit_profile">
                                                    <input type="password" value="" id="con-pass" name="passwordAgain"  class="form-control{{ $errors->has('passwordAgain') ? ' is-invalid' : '' }}"  required>
                                                    @if ($errors->has('passwordAgain'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('passwordAgain') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr />
                                        </div>
                                    
                                        @if(session('thongbao'))
                                        <div class="alert alert-danger">
                                           {{session('thongbao')}}
                                       </div>                                
                                        @endif
                                    </div>    
                                    
                
                                </div>
                            </div>
                        </div>
                        <button type="button" class="site-btn register-btn edit" style="margin-top: 10px;"><span>Change Password</span></button> 
                        <button type="submit" class="site-btn register-btn save_btn" style="margin-top: 10px;"><span>Save</span></button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<style>

</style>
@endsection
