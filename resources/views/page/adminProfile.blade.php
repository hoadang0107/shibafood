@extends('home')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                
                                <div class="userData ml-3">
                                <h2>ADMIN</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="basicInfo-tab" data-toggle="tab" href="#basicInfo" role="tab" aria-controls="basicInfo" aria-selected="true">List Store</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="connectedServices-tab" data-toggle="tab" href="#connectedServices" role="tab" aria-controls="connectedServices" aria-selected="false">Check Store</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="listUser-tab" data-toggle="tab" href="#listUser" role="tab" aria-controls="listUser" aria-selected="false">List Users</a>
                                    </li>
                                </ul>
                                <div class="tab-content ml-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="basicInfo" role="tabpanel" aria-labelledby="basicInfo-tab">
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{session('success')}}
                                            </div>
                                        @endif
                                        <table style="width: 100%">
                                            <tr>
                                                <th>Store ID</th>
                                                <th>Store Name</th>
                                                <th>UserID</th>
                                                <th>Review</th>
                                                <th>Star</th>
                                            </tr>
                                            @foreach($all_res as $restaurant)
                                            @if ($restaurant->duyet)
                                            <tr>
                                                <td>{{$restaurant->id}}</td>
                                                <td>{{$restaurant->name}}</td>
                                                <td>{{$restaurant->userID}}</td>
                                                <td>{{$restaurant->description}}</td>
                                                <td>{{$restaurant->rating}}</td>
                                                <td><a href="admin/delete/{{$restaurant->id}}">Delete</a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach                                            
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        Tab check
                                         <table style="width: 100%">
                                            <tr>
                                                <th>Store ID</th>
                                                <th>Store Name</th>
                                                <th>User</th>
                                                <th>Review</th>
                                                <th>Star</th>
                                            </tr>
                                            @foreach($all_res as $restaurant)
                                            @if (!$restaurant->duyet)
                                            <tr>        
                                                <td>{{$restaurant->id}}</td>
                                                <td>{{$restaurant->name}}</td>
                                                <td>{{$restaurant->userID}}</td>
                                                <td></td>
                                                <td></td>

                                                <td><a href="Verify/{{ $restaurant->id }}"><input type="submit" name="pending" value="Verify"
                                                                         class="site-btn register-btn"></a></td>

                                            </tr>
                                            @endif
                                            @endforeach                                                 
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="listUser" role="tabpanel" aria-labelledby="ListUser-tab">
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{session('success')}}
                                            </div>
                                        @endif
                                        <table style="width: 100%">
                                            <tr>
                                                <th>UserID</th>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Quyền</th>
                                                <th>Avatar</th>
                                            </tr>
                                            @foreach($all_user as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->quyen}}</td>
                                                <td><img src="upload/user/{{$user->avatar}}" style="width: 90px; height: 90px; object-fit: contain"></td>
                                                <td><a href="admin/deleteUser/{{$user->id}}">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
<style>
    table, th, td{
        border:1px solid black;
        text-align:center
        
    }
    table{
        border-collapse:collapse;
    }
    tr:hover{
        background-color:#ddd;
        cursor:pointer;
    }
    tr{
        padding: 10px;
        margin: 10px;
        height: 30px;
    }
</style>
@endsection