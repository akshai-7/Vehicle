<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
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
            overflow: hidden;
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
            width: 15%;
            height: 200;
            background: #f0d6d6;
        }
        #div-2{
            width: 85%;
            height: 200;
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
            background: #f0d6d6;
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
            display: block;
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
    height: 7vh;
    display: flex;
    margin: 5px;
    padding: 0.875em 2em;
    font-family: inherit;
    color: #000;
    text-decoration: none;
    transition:0.3s;
    place-content: center;
}
.nav_list:hover{
    width: 100%;
    padding: 0 10px;
    box-sizing: border-box;
    margin: 5px;
    height: 7vh;
    display: flex;
    justify-content: space-evenly;
    border-radius: 10px;
    box-shadow: 4px 7px 5px 0px #F7D4D4;
    align-items: center;
    background: linear-gradient(90deg, #b53f3f, transparent) #f18e8e;
    color: #fff;

}
                .nav_icon{
            font-size: 1.25rem
        }
        main {
            position: relative;
            width: 85%;
            left: 120px;
            margin-top: 70px;
        }
        .table-data{
            border-radius:8px;
            background: var(--light);
            padding: 24px;
            overflow-x: auto;
        }
        table {
            width: 100%;
            margin-top: 2%;
        }
         table th {
            padding-bottom: 12px;
            font-size: 17px;
            color: black;
            border-bottom: 1px solid var(--grey);
        }
        table td {
            padding: 15px ;
        }
        #add{
            background: #06064b;
            border-radius: 5px;
            border: 1px solid #06064b;
            cursor: pointer;
            top:50px;
            height: 30px;
            position: relative;
            width: 80px;
            float: right;
            margin-right: 100px;
            text-decoration: none;
        }
        .table_row {
            background: rgb(237, 233, 233);
        }
        .table_row:hover {
            background: white;
        }
        .table_row:hover .table_data{
            color: black;
        }
        .tablinks{
            padding: 5px 5px;
            border: none;
            border-radius: 4px;
            outline: none;
            cursor: pointer;
            transition: 0.6s;
        }
        button.active {
            /* background:#bb1138; */
            background: linear-gradient(90deg,  #f18e8e, transparent) #b53f3f;
            color: white
        }
        .main{
            margin-top: 50px;

        }
        .tabcontent{
            margin-top: 20px;
        }
        #Cabin{
            overflow: scroll;
            height: 65%;
            position: relative;
            width: 85%;
            left: 120px;
            margin-top: 20px;
        }
        #Cabin::-webkit-scrollbar{
                display: none;
        }
</style>
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
            <a  class="nav_list" href="/inspectiondetails"><div class="icon-name"> <i class="fa-solid fa-list"></i> </div><span class="nav_name"> Inspection List</span> </a>
            <a  class="nav_list"href="/"> <div class="icon-name"><i class='bx bx-log-out nav_icon'></i> </div><span class="nav_name">SignOut</span> </a>
        </div>
        <div id="div-2">
            <header class="headers" id="headers">
                 <div class="header_toggle" id="toggle-container"> <i class='bx bx-x ' id="header-toggle"></i> </div>
                 {{-- <div class="header_img"> <img src="{{url('img/m-d-foundation.png')}}" class="img"> </div> --}}
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
                            <i class="fa-regular fa-circle-x"></i> {{session('message1')}}
                        </div>
                    </div>
                @endif
            </div>
            <main class="main">
                <div class="button">
                    <button class="tablinks " onclick="openCheck(event, 'Visual')" id="defaultOpen"><h5 >Visual Damage</h5></button>
                    <button class="tablinks" onclick="openCheck(event, 'Vehicle')"><h5 >Vehicle Check</h5></button>
                    <button class="tablinks" onclick="openCheck(event,'Cabin')"><h5 >Cabin Checks</h5></button>
                </div>
                <div id="Visual" class="tabcontent">
                    <div class="table-data">
                        <table class="table table-bordered mt-3" style="border: 1px solid lightgrey" >
                            <thead>
                                <th style="text-align:center;">S.No</th>
                                <th style="text-align:center;">View</th>
                                <th style="text-align:center;">Image</th>
                                <th style="text-align:center;">Feed Back</th>
                                <th style="text-align:center;">Action</th>
                                <th style="text-align:center;"></th>
                            </thead>
                            <tbody>
                                @foreach($visual as $visual)
                                    <tr class="table_row">
                                        <td style="text-align:center;" class="table_data">{{$loop->iteration}}</td>
                                        <td style="text-align:center;" class="table_data">{{$visual->view}}</td>
                                        <td style="text-align:center;" class="table_data"><img src="{{url('images/'.$visual->image)}}" class="rounded-0 border border-secondary"  width="50px" height="50px" ></td>
                                        <td style="text-align:center;" class="table_data">{{$visual->feedback}}</td>
                                        <td style="text-align:center;" class="table_data">{{$visual->action}}</td>
                                        <td style="text-align:center;" class="table_data">
                                        <a href="/updatevisualcheck/{{$visual->id}}"><i class="fa-solid fa-edit btn btn-success" ></i></a>
                                        <a href="/deletevisual/{{$visual->id}}" ><i class="fa-solid fa-trash btn btn-danger"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                    </div>
                </div>
                <div id="Vehicle" class="tabcontent">
                    <div class="table-data">
                        <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                            <thead>
                                <th style="text-align:center;">S.No</th>
                                <th style="text-align:center;">View</th>
                                <th style="text-align:center;">Image</th>
                                <th style="text-align:center;">Feed Back</th>
                                <th style="text-align:center;">Action</th>
                                <th style="text-align:center;"></th>
                            </thead>
                            <tbody>
                                @foreach($vehicle as $vehicle)
                                 <tr class="table_row">
                                    <td style="text-align:center;" class="table_data">{{$loop->iteration}}</td>
                                    <td style="text-align:center;" class="table_data">{{$vehicle->view}}</td>
                                    <td style="text-align:center;" class="table_data"><img src="{{url('images/'.$vehicle->image)}}"  width="50px" height="50px" alt="" class="rounded-0 border border-secondary " ></td>
                                    <td style="text-align:center;" class="table_data">{{$vehicle->feedback}}</td>
                                    <td style="text-align:center;" class="table_data">{{$vehicle->action}}</td>
                                    <td style="text-align:center;" class="table_data">
                                    <a href="/updatevehiclecheck/{{$vehicle->id}}"><i class="fa-solid fa-edit btn btn-success" ></i></a>
                                    <a href="/deletevehicle/{{$vehicle->id}}" ><i class="fa-solid fa-trash btn btn-danger"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
           </main>
            <div id="Cabin" class="tabcontent">
             <div class="table-data">
                <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                    <thead>
                        <th style="text-align:center;">S.No</th>
                        <th style="text-align:center;">View</th>
                        <th style="text-align:center;">Image</th>
                        <th style="text-align:center;">Feed Back</th>
                        <th style="text-align:center;">Action</th>
                        <th style="text-align:center;"></th>
                    </thead>
                    <tbody>
                        @foreach($cabin as $cabin)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">{{$loop->iteration}}</td>
                            <td style="text-align:center;" class="table_data">{{$cabin->view}}</td>
                            <td style="text-align:center;" class="table_data"><img src="{{url('images/'.$cabin->image)}}"  width="50px" height="50px" alt="" class="rounded-0 border border-secondary"></td>
                            <td style="text-align:center;" class="table_data">{{$cabin->feedback}}</td>
                            <td style="text-align:center;" class="table_data">{{$cabin->action}}</td>
                            <td style="text-align:center;" class="table_data">
                                <a href="/updatecabincheck/{{$cabin->id}}"><i class="fa-solid fa-edit btn btn-success" ></i></a>
                                <a href="/deletecabin/{{$cabin->id}}" ><i class="fa-solid fa-trash btn btn-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
             </div>
            </div>
            <div>
                <a href="/summary/{{$cabin->assign_id}}"><input type="submit" value="Summary" class="text-white" style="background: #06064b" id="add"></a>
            </div>
            </div>
    </section>
<script>
            function openCheck(evt,Name) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(Name).style.display = "block";
            evt.currentTarget.className +=" active";

            }
            document.getElementById("defaultOpen").click();


        //sidebar
            var toggleBtn=document.getElementById("toggle-container");
            var isOpen=true;
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
</script>

</body>
</html>
