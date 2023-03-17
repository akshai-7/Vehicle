<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>user.pdf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
    <header class="headers" id="headers">
        {{-- <div class="header_toggle" id="toggle-container"> <i class='bx bx-menu ' id="header-toggle"></i> </div> --}}
        <div class="header_img"> <img src="{{('images/m-d-foundation.png')}}" class="img" > </div>
    </header>
     <h2> Report Summary</h2>
     <div class="date">
        <strong> Date : {{ date("d.m.Y") }}  </strong>
    </div>
        <h5 class="text-secondary" class="check first">Visual Damage</h5>
        <table style="width:80%" class="">
            {{-- <tr>
                <th class="col-md-5" style="text-align:center;"> View</th>
                <th style="text-align:" style="text-align:center;">Action</th>
            </tr> --}}
            @foreach($visual as $visual)
                <tr style="tect-align:center;">
                    <td >{{$visual->view}}</td>
                    <td style="text-align:center; ">{{$visual->action}}</td>
                </tr>
            @endforeach
        </table>
        <h5 class="text-secondary"  class="check">Vehicle Check</h5>
        <table style="width:80%" class="vehicle">
            @foreach($vehicle as $vehicle)
                <tr>
                    <td>{{$vehicle->view}}</td>
                    <td style="text-align:center;">{{$vehicle->action}}</td>
                </tr>
            @endforeach
        </table>
        <h5 class="text-secondary" class="check">Cabin Checks</h5>
        <table  style="width:80%">
            @foreach($cabin as $cabin)
                <tr>
                    <td >{{$cabin->view}}</td>
                    <td style="text-align: center">{{$cabin->action}}</td>
                </tr>
        @endforeach
        </table>

        <h4 class="sign">Signature</h4>
</body>
</html>
