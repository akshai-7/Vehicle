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
    <link rel="stylesheet" href="css/app.css">
	<title>M&D Foundations</title>
</head>
<body>
<section id="container">
    <div id="div-1">
        <div id="img-container">
         <img  id="img-logo" src="{{url('images/m-d-foundation.png')}}">
        </div>
        <a class="nav_list" href="/user" ><div class="icon-name"><i class="fa-solid fa-user nav_icon"></i></div> <div class="nav_name">Drivers </div> </a>
        <a  class="nav_list" href="/vehiclelist" ><div class="icon-name"> <i class="fa-solid fa-car"></i> </div><span class="nav_name">Vehicles</span> </a>
        <a  class="nav_list" href="/vehicleassign"><div class="icon-name"><i class="fa-solid fa-folder-open"></i></div><span class="nav_name"> Vehicle Assign</span> </a>
        <a  class="nav_list" href="/vehicleassignedlist"><div class="icon-name"> <i class="fa-solid fa-list"></i> </div><span class="nav_name">Assigned List</span> </a>
        <a  class="nav_list"href="/"> <div class="icon-name"><i class='bx bx-log-out nav_icon'></i> </div><span class="nav_name">SignOut</span> </a>
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
                    <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
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
