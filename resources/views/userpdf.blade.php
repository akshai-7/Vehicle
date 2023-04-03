<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user.pdf</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
        padding: 8px;
        margin-left: 50px;

    }

    .check {
        margin-left: 50px;
    }

    .sign {
        margin-left: 550px;
        margin-top: 100px;
    }

    .date {
        margin-left: 550px;
        margin-top: -30px;
    }

    .first {
        margin-top: 30px;
    }

    h2 {
        margin-left: 250px;
    }
</style>

<body>
    <header class="headers" id="headers">
        <div class="header_img"> <img src="{{ 'images/m-d-foundation.png' }}" class="img"> </div>
    </header>
    <h2> Report Summary</h2>
    <div class="date">
        <strong> Date : {{ date('d.m.Y') }} </strong>
    </div>
    <h5 class="text-secondary" class="check first">Visual Damage</h5>
    <table style="width:80%" class="">

        @foreach ($visual as $visual)
            <tr style="tect-align:center;">
                <td>{{ $visual->view }}</td>

                <td style="text-align:center;" class=" col-md-2 table_data">
                    @php
                        $path = public_path('images/' . explode(',', $visual->image)[0]);
                        $type = pathinfo($path, PATHINFO_EXTENSION);
                        $data = file_get_contents($path);
                        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                    @endphp
                    <img src="{{ $base64 }}" width="50px" height="50px" alt=""
                        class="rounded-0 border border-secondary ">
                </td>
                <td style="text-align:center; ">{{ $visual->feedback }}</td>
                <td style="text-align:center; ">{{ $visual->action }}</td>
            </tr>
        @endforeach
    </table>
    <h5 class="text-secondary" class="check">Vehicle Check</h5>
    <table style="width:80%" class="vehicle">
        @foreach ($vehicle as $vehicle)
            <tr>
                <td>{{ $vehicle->view }}</td>

                <td style="text-align:center;" class=" col-md-2 table_data">


                    @if ($vehicle->image != null)
                        @php
                            $path = public_path('images/' . explode(',', $vehicle->image)[0]);
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        @endphp
                        <img src="{{ $base64 }}" width="50px" height="50px" alt=""
                            class="rounded-0 border border-secondary ">
                    @endif
                    @if ($vehicle->image == null)
                        <p style="text-align:center;">--</p>
                    @endif
                </td>
                <td style="text-align:center; ">{{ $vehicle->feedback }}</td>
                <td style="text-align:center; ">{{ $vehicle->action }}</td>
            </tr>
        @endforeach
    </table>
    <h5 class="text-secondary" class="check">Cabin Checks</h5>
    <table style="width:80%">
        @foreach ($cabin as $cabin)
            <tr>
                <td>{{ $cabin->view }}</td>

                <td style="text-align:center;" class=" col-md-2 table_data">

                    @if ($cabin->image != null)
                        @php
                            $path = public_path('images/' . explode(',', $cabin->image)[0]);
                            $type = pathinfo($path, PATHINFO_EXTENSION);
                            $data = file_get_contents($path);
                            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                        @endphp
                        <img src="{{ $base64 }}" width="50px" height="50px" alt=""
                            class="rounded-0 border border-secondary ">
                    @endif
                    @if ($cabin->image == null)
                        <p style="text-align:center;">--</p>
                    @endif
                </td>
                <td style="text-align:center; ">{{ $cabin->feedback }}</td>
                <td style="text-align:center; ">{{ $cabin->action }}</td>
            </tr>
        @endforeach
    </table>

    <h4 class="sign">Signature</h4>
</body>

</html>
