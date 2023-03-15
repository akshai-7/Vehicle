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
        --first-color:#ddddfc;
        --first-color-light:black;
        --white-color: #F7F6FB;
        --z-fixed: 100;
        --light: #F9F9F9;
        --grey: #eee;
        --dark-grey: #AAAAAA;
        --dark: #342E37;s
    }
    html {
        overflow-x: hidden;
    }
    body{
        font-family: 'EB Garamond', serif;
        /* font-family: 'Times New Roman', Times, serif; */
        background: var(--grey);
    }
    a{
        text-decoration: none;
    }
    #container{
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: row
    }
    #div-1{
        width: 5%;
        height: 200;
        /* margin-right:200px; */
        background: #bebef0;
    }
    #div-2{
        width: 95%;
        height: 200;
    }
    #headers{
        width: 100%;
        padding: 10px;
        display: flex;
        justify-content: space-between;
        align-content: center;
        background: #bebef0;
    }
    #message{
        position:fixed;
        top: 70px;
        right: 10px;
        animation-duration: 1s;
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
        cursor: pointer
    }
    .img {
        width: 100px;
        /* height:40px; */
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
        width: 80%;
        left: 120px;
    }
    .table-data{
        margin-top: 10%;
        border-radius:8px;
        background: var(--light);
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
        color: #06064b;
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
        width: 80px;
    }
    .table_row {
        background: rgb(237, 233, 233);
    }
    .table_row:hover {
        background: white
    }
    .table_row:hover  .table_data{
        color: black;
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
            .vehicle {
                margin-left: 10px;
            }
            .close{
                margin-left: 600px;
                margin-bottom: 10%;
            }
</style>
<body>
<section id="container">
    <div id="div-1">
        <div id="img-container">
         <img  id="img-logo" src="{{url('images/m-d-foundation.png')}}">
        </div>
         <a class="nav_list" href="/user" ><div class="icon-name"><i class="fa-solid fa-user nav_icon"></i></div> <div class="nav_name">Drivers </div> </a>
         <a  class="nav_list" href="/vehiclelist" ><div class="icon-name"> <i class="fa-solid fa-car"></i> </div><span class="nav_name">vehicles</span> </a>
         <a  class="nav_list"href="/" > <div class="icon-name"><i class='bx bx-log-out nav_icon'></i> </div><span class="nav_name">SignOut</span> </a>
    </div>
    <div id="div-2">
        <header class="headers" id="headers">
            <div class="header_toggle" id="toggle-container"> <i class='bx bx-menu ' id="header-toggle"></i> </div>
        </header>
        <div class="message" id="message">
            @if (session()->has('message'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="width: 300px;height:20px">
                <div   div class="alert alert-success">
                    <i class="fa-regular fa-circle-check"></i> {{session('message')}}
                </div>
            </div>
            @endif
        </div>
        <div class="message1" id="message">
            @if (session()->has('message1'))
                <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" style="width: 300px;height:20px;">
                    <div class="alert alert-danger">
                        <i class="fa-regular fa-circle-x"></i>{{session('message1')}}
                    </div>
                </div>
            @endif
        </div>
        <main>
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Vehicle Details</h3>
					</div>
                    <table>
                        <thead class="text-primary">
                            <th style="text-align:center;">Id</th>
                            <th style="text-align:center;">Number plate</th>
                            <th style="text-align:center;">Vehicle Name</th>
                            <th style="text-align:center;">Vehicle Type</th>
                            <th style="text-align:center;">Mileage</th>
                            <th style="text-align:center;">Action</th>
                        </thead>
                        <tbody>
                            @foreach($vehicle as $vehicle)
                                 <tr class="table_row">
                                    <td style="text-align:center;" class="table_data">{{$vehicle->id}}</td>
                                    <td style="text-align:center;" class="table_data">{{$vehicle->number_plate}}</td>
                                    <td style="text-align:center;" class="table_data">{{$vehicle->vehicle_name}}</td>
                                    <td style="text-align:center;" class="table_data">{{$vehicle->vehicle_type}}</td>
                                    <td style="text-align:center;" class="table_data">{{$vehicle->mileage}}Km</td>
                                    <td style="text-align:center;" class="table_data">
                                    {{-- <a href="/details/{{$vehicle->id}}"><i class="fa-solid fa-eye btn  text-white" style="background:#06064b "></i></a> --}}
                                    <a onclick="show('popup')"><i class="fa-solid fa-edit btn btn-success" ></i></i></a>
                                    <a href="/remove/{{$vehicle->id}}"><i class="fa-solid fa-trash btn btn-danger" ></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
			</div>
		</main>
        <div class="popup" id="popup">
            <form action="/updatevehicle/{id}" method="POST" autocomplete="off"  >
                @csrf
                <a href="#" onclick="hide('popup')" style="color:black;" class="close"><i class="fa-solid fa-xmark"></i></a>
                <h5 class="" style="color:#06064b;"><i class="fa-solid fa-user"></i> Update Vehicle</h5>
                    <div class="vehicle">
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-10">
                                <input type="text" name="id" class="form-control"  value="{{$vehicle->id}}"><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')*{{$message}}@enderror</div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label class="col-sm-2 col-form-label">Number_Plate</label>
                            <div class="col-sm-10">
                                <input type="text" name="number_plate" class="form-control"  value="{{$vehicle->number_plate}}"><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('number_plate')*{{$message}}@enderror</div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Vehicle_Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="vehicle_name" class="form-control"  value="{{$vehicle->vehicle_name}}"><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('vehicle_name')*{{$message}}@enderror</div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Vehicle_Type</label>
                            <div class="col-sm-10">
                                <input type="text" name="vehicle_type" class="form-control" value="{{$vehicle->vehicle_type}}" ><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('vehicle_type')*{{$message}}@enderror</div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label  class="col-sm-2 col-form-label"> Mileage</label>
                            <div class="col-sm-10">
                              <input type="text" name="mileage" class="form-control" value="{{$vehicle->mileage}}" ><div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mileage')*{{$message}}@enderror</div>
                              <input type="submit" name="" value="Submit" class="btn text-white mt-4" style="float:right;background:#06064b;">
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</section>
<script>
    var toggleBtn=document.getElementById("toggle-container");
    var isOpen=false;
    toggleBtn.addEventListener("click",()=>{
        if(isOpen){
            var divsToHide = document.getElementsByClassName("nav_name");
            document.getElementById("div-1").style.width="5%";
            document.getElementById("div-1").style.transition="0.6s";
            document.getElementById("div-2").style.width="95%";//divsToHide is an array
            document.getElementById("toggle-container").innerHTML = "<i class='bx bx-menu' id='header-toggle'></i>";
                for(var i = 0; i < divsToHide.length; i++){

                    divsToHide[i].style.display = "none"; // depending on what you're doing
                }
            isOpen=!isOpen;
        }else{

            document.getElementById("div-1").style.width="15%";
            document.getElementById("div-2").style.transition="0.6s";
            var divsToHide = document.getElementsByClassName("nav_name"); //divsToHide is an array
            document.getElementById("toggle-container").innerHTML = "<i class='bx bx-x' id='header-toggle'></i>";

                for(var i = 0; i < divsToHide.length; i++){
                    divsToHide[i].style.display = "block"; // depending on what you're doing
                }
            document.getElementById("div-2").style.width="85%";
            isOpen=!isOpen;
        }
    })
    $ = function(id) {
        return document.getElementById(id);
        }
        var show = function(id) {
            $(id).style.display ='block';
        }
        var hide = function(id) {
            $(id).style.display ='none';
        }
</script>

</body>
</html>
