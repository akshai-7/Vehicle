<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
	<title>M&D Foundations</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap');
            :root{
                --header-height: 3rem;
                --first-color:#b8b8ee;
                --first-color-light:black;
                --white-color: #F7F6FB;
                --z-fixed: 100;
                --light: #F9F9F9;
                --grey: #eee;
                --dark-grey: #AAAAAA;
                --dark: #342E37;s
            }
            html {
                overflow-y: hidden;
            }
            body{
                font-family: 'EB Garamond', serif;
                /* font-family: 'Times New Roman', Times, serif; */
                background: var(--grey);
                overflow: hidden;
            }
            a{
                text-decoration: none;
            }
            #container{
                width: 100%;
                height: 100vh;
                display: flex;
                flex-direction: row;
            }
            #div-1{
                width: 5%;
                height: 200;
                background:#bebef0;

            }
            #div-2{
                width: 95%;
                height: 200;
                position: relative;
            }
            #message{
                position:fixed;
                top: 70px;
                right: 10px;
                animation-duration: 1s;
            }
            #headers{
                width: 100%;
                padding: 10px;
                display: flex;
                justify-content: space-between;
                align-content: center;
                background: #bebef0;
            }
            .icon-name{
                justify-content: center;
                align-items: center;
                align-content: center;
                display: flex;
               flex: 1

            }
            .nav_name{
                flex: 2;
                display: none;
            }

            .header{
                width: inherit;
                height: var(--header-height);
                position: fixed;
                top: 0;
                left: 0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 1rem;
                background-color: var(--white-color);
                z-index: var(--z-fixed);
                transition: .5s
            }
            .header_toggle{
                color: black;
                font-size: 1.5rem;
                cursor: pointer;
            }
            #img-container{
                width: 100%;
                height: 100px;
                display: flex;
                justify-content: center;
                align-items: center
            }
            #img-logo{
                width: 60%;
            }
            #img-logo1{
                width: 80%;
                border-radius: 50%;
                margin-right: -155px;
                margin-top: -10px;
            }
            .nav_list{
                width: 100%;
                padding: 0 10px;
                height: 7vh;
                border-radius: 4px;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                color: black
            }
            .nav_list:hover{
                width: 100%;
                padding: 0 10px;
                height: 7vh;
                border-radius: 4px;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
                border-radius: 10px;
                background: whitesmoke;
                color:blue;
            }
            .nav_icon{
                font-size: 1.25rem
            }
            main {
                position: relative;
                width: 85%;
                left: 120px;
            }
            .table-data{
                margin-top: 10%;
                border-radius:8px;
                background:var(--light);
                padding: 24px;
                overflow-x: auto;
            }
            .head {
                display: flex;
            }
            .head h3 {
                margin-right: auto;
                font-weight: 600;
                color: #06064b;
            }
            .order table {
                width: 100%;
                margin-top: 2%;
            }
            .order table th {
                padding-bottom: 12px;
                font-size: 17px;
                color: black;
                border-bottom: 1px solid var(--grey);
            }
            .order table td {
                padding: 16px 0;
            }
            #add{
                background: rgb(254,231,154);
                border-radius: 5px;
                border: 1px solid #D69E31;
                color: #85592e;
                cursor: pointer;
                top:-5px;
                height: 30px;
                position: relative;
                width: 90px;
            }
            .table_row {
                background: rgb(237, 233, 233);
            }
            .table_row:hover {
                background: white;
            }
            .table_row:hover  .table_data{
                color: black;
            }
            .main{
                /* margin-top: 30px; */
                height: 80%;
                overflow: scroll;
            }
            .main::-webkit-scrollbar {
             display: none;
            }
            .popup {
                display: none;
                position: fixed;
                padding: 20px;
                width: 700px;
                height: 450px;
                left: 50%;
                margin-left: -250px;
                top: 30%;
                margin-top: -50px;
                background: #FFF;
                z-index: 20;
                align-items: center;
                justify-content: center;
            }

            #popup:after {
                position: fixed;
                content: "";
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                background: rgba(0,0,0,0.5);

                z-index: -2;
            }
            #popup:before {
                position: absolute;
                content: "";
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                background:var(--light);
                z-index: -1;
            }
            form{
                margin-left: 50px;
            }
            .table-data1{
                position: relative;
                color: #06064b;
                margin-top: 50px;
                margin-left: 120px;
                width: 220px;
                height: 90px;
                border-radius:8px;
                background: var(--light);
            }
            .usercount{
                margin-left: 15px;
                padding:10px;
            }
            .close{
                margin-left: 600px;
                margin-bottom: 10%;
            }
            .open-button {
                padding: 13px 10px;
                cursor: pointer;
                position: fixed;
                right: 28px;
            }
            .form-popup {
                display: none;
                position: fixed;
                padding:10px;
                height: 100px;
                width: 200px;
                margin-top: 50px;
                right: 45px;
                background:var(--light);
                border-radius: 4px;
                z-index: 9;
            }
            .form-group {
        display: flex;
        justify-content: space-between;
    }
    .report1{
         display: flex;
    }
    .report{
        width: 40%;
    }
    .subreport{
       margin-left: 50px;
       width: 40%;
    }

</style>
<body>
<section id="container">

    <div id="div-1">
       <div id="img-container">
        <img  id="img-logo" src="{{url('img/m-d-foundation.png')}}">
       </div>
        <a class="nav_list" href="/user" ><div class="icon-name"><i class='bx bx-grid-alt nav_icon'></i></div> <div class="nav_name">Dashboard </div> </a>
        <a  class="nav_list" href="/allrentallist" ><div class="icon-name"> <i class="fa-solid fa-list"></i> </div><span class="nav_name">Inspection</span> </a>
        <a  class="nav_list"href="/"> <div class="icon-name"><i class='bx bx-log-out nav_icon'></i> </div><span class="nav_name">SignOut</span> </a>
    </div>
    <div id="div-2">
        <header class="headers" id="headers">
            <div class="header_toggle" id="toggle-container"> <i class='bx bx-menu ' id="header-toggle"></i> </div>
            <a href="#" class="open-button" onclick="openForm()"><img  id="img-logo1" src="{{url('images/user-2.png')}}"></a>
            <div class="form-popup" id="myForm">
                <div class="container">
                    <a type="button"  onclick="closeForm()" style="color:black;margin-left:140px;"><i class="fa-solid fa-xmark"></i></a>
                    <div class="cls" style="margin-top: -20px;">
                        <tr> <i class="fa-solid fa-user" ></i> {{$user1->name}}</tr><br>
                    <tr> <i class="fa-solid fa-envelope"></i> {{$user1->email}}</tr><br>
                    <a href="/" style="color:black;"> <i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a><br>

                    </div>
                </div>
            </div>
        </header>
        <div class="message" id="message">
            @if (session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="width: 200px;height:20px">
                <div   div class="alert alert-success">
                    <i class="fa-regular fa-circle-check"></i> {{session('message')}}
                </div>
            </div>
            @endif
        </div>
        <div class="message1" id="message">
            @if (session()->has('message1'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="width: 200px;height:20px;">
                    <div class="alert alert-danger">
                        <i class="fa-regular fa-circle-x"></i>{{session('message1')}}
                    </div>
                </div>
            @endif
        </div>
        <main class="main">
            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Driver Details</h3>
                        <a href="#" style="margin-right: 20px"><input type="submit" value="Add-Driver" class="text-primary button" id="add" onclick="show('popup')"></a>
                        <a href="#" style="margin-right: 20px"><input type="submit" value="Add-Vehicle" class="text-primary button" id="add" onclick="show('popup')"></a>
                    </div>
                    <table class="">
                        <thead class="text-primary">
                            <th style="text-align:center;">S.No</th>
                            <th style="text-align:center;">Name</th>
                            <th style="text-align:center;">Gender</th>
                            <th style="text-align:center;">D.O.B</th>
                            <th style="text-align:center;">Email</th>
                            <th style="text-align:center;">Mobile</th>
                            <th style="text-align:center;">Address</th>
                            <th style="text-align:center;">Role</th>
                            <th style="text-align:center;">Creation Date</th>
                            <th style="text-align:center;">Action</th>
                        </thead>
                        <tbody>
                            @foreach($user as $user)
                                 <tr class="table_row">
                                    <td style="text-align:center;" class="table_data">{{$loop->iteration}}</td>
                                    <td style="text-align:center;" class="table_data">{{$user->name}}</td>
                                    <td style="text-align:center;" class="table_data">{{$user->gender}}</td>
                                    <td style="text-align:center;" class="table_data">{{$user->date_of_birth}}</td>
                                    <td style="text-align:center;" class="table_data">{{$user->email}}</td>
                                    <td style="text-align:center;" class="table_data">{{$user->mobile}}</td>
                                    <td style="text-align:center;" class="table_data">{{$user->address}}</td>
                                    <td style="text-align:center;" class="table_data">{{$user->role}}</td>
                                    <td style="text-align:center;" class="table_data">{{$user->created_at->format('d.m.Y')}}</td>
                                    <td style="text-align:center;" class="table_data">
                                        <a href="/driver/{{$user->id}}"><i class="fa-solid fa-eye btn  text-white" style="background:#06064b"></i></a>
                                        <a href="/updateuser/{{$user->id}}" ><i class="fa-solid fa-edit btn btn-success" ></i></i></a>
                                        <a href="/createdriver/{{$user->id}}"><i class="fa-solid fa-plus btn btn-secondary"></i></a>
                                        <a href="/delete/{{$user->id}}" ><i class="fa-solid fa-trash btn btn-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <div class="popup" id="popup">
            <form action="/createuser" method="POST" autocomplete="off"  >
                @csrf
                <a href="#" onclick="hide('popup')" style="color:black;" class="close"><i class="fa-solid fa-xmark"></i></a>

                <h5 class="" style="color:#06064b;"><i class="fa-solid fa-user"></i> Create Driver</h5>
                <div class="report1" >
                    <div class="report">
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Name</label>
                            <div class="col-sm-9">
                              <input type="text" name="name" class="form-control" ><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')*{{$message}}@enderror</div>
                            </div>
                        </div>
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2  col-form-label"> Gender</label>
                                <div class="col-sm-9">
                                  <input type="text" name="gender" class="form-control" ><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')*{{$message}}@enderror</div>
                                </div>
                            </div>

                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                                <div class="col-sm-9">
                                  <input type="text" name="date_of_birth" class="form-control" ><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date_of_birth')*{{$message}}@enderror</div>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label for="" class="col-sm-2 col-form-label"> Address</label>
                                <div class="col-sm-9">
                                  <input type="text" name="address" class="form-control" ><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('address')*{{$message}}@enderror</div>
                                </div>
                            </div>

                    </div>
                    <div class="subreport">

                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2  col-form-label"> Email</label>
                            <div class="col-sm-9">
                              <input type="text" name="email" class="form-control" ><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')*{{$message}}@enderror</div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-9">
                              <input type="text" name="password" class="form-control" ><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('password')*{{$message}}@enderror</div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label"> Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" name="mobile" class="form-control" ><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')*{{$message}}@enderror</div>
                                <input type="submit" name="" value="Submit" class="btn text-white mt-4" style="float:right;background:#06064b;">

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</section>

</body>
<script>
    //sidebar
            var toggleBtn=document.getElementById("toggle-container");
            var isOpen=false;
            toggleBtn.addEventListener("click",()=>{
                if(isOpen){
                    var divsToHide = document.getElementsByClassName("nav_name");
                    document.getElementById("div-1").style.width="5%";
                    document.getElementById("div-1").style.transition="0.6s";
                    document.getElementById("div-2").style.width="95%";

                    document.getElementById("toggle-container").innerHTML = "<i class='bx bx-menu' id='header-toggle'></i>";
                        for(var i = 0; i < divsToHide.length; i++){

                            divsToHide[i].style.display = "none";
                        }

                    isOpen=!isOpen;
                }else{
                    document.getElementById("div-1").style.width="15%";
                    document.getElementById("div-2").style.transition="0.6s";
                    var divsToHide = document.getElementsByClassName("nav_name");
                    document.getElementById("toggle-container").innerHTML = "<i class='bx bx-x' id='header-toggle'></i>";

                        for(var i = 0; i < divsToHide.length; i++){
                            divsToHide[i].style.display = "block";
                        }
                    document.getElementById("div-2").style.width="85%";
                    isOpen=!isOpen;
                }
        })

//create user
        $ = function(id) {
        return document.getElementById(id);
        }
        var show = function(id) {
            $(id).style.display ='block';
        }
        var hide = function(id) {
            $(id).style.display ='none';
        }
//admin popup
        function openForm() {
                document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
                document.getElementById("myForm").style.display = "none";
    }


</script>
</html>
