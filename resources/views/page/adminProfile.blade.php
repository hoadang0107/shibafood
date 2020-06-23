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
                                                <th>Number</th>
                                                <th>Store Name</th>
                                                <th>UserID</th>
                                                <th>Review</th>
                                                <th>Star</th>
                                            </tr>
                                            @foreach($all_res as $restaurant)
                                            <tr>
                                                <td>{{$restaurant->id}}</td>
                                                <td>{{$restaurant->name}}</td>
                                                <td>{{$restaurant->userID}}</td>
                                                <td>{{$restaurant->description}}</td>
                                                <td>{{$restaurant->rating}}</td>
                                                <td><a href="admin/delete/{{$restaurant->id}}">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach                                            
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="connectedServices" role="tabpanel" aria-labelledby="ConnectedServices-tab">
                                        Tab check
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