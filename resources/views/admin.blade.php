@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Admin Details</h3>
                    <a href="/addadmin" style="margin-right:20px;"><input type="submit" value="Add Admin" id="add"></a>
                </div>
                <div class="serachbar">
                    <form action="/adminsearch" method="GET" autocomplete="off" style="margin-left:-5px">
                        <div id="filterDiv1">
                            <div class="col-md-7" id="filter">
                                <label></label>
                                @if (isset($_GET['date']))
                                    <input type="text" name="date" class="form-control flatdate"
                                        value="{{ $_GET['date'] }}">
                                @else
                                    <input type="text" name="date" class="form-control flatdate" value="Select Date">
                                @endif
                            </div>
                            <div class="col-md-7" style="margin-left:5px">
                                <label></label>
                                <select class="form-select form-control" name="name">
                                    @if (isset($_GET['name']))
                                        <option value="{{ $_GET['name'] }}">{{ $_GET['name'] }}</option>
                                        @foreach ($datas as $data)
                                            <option value="{{ $data->name }}">
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @else
                                        <option>Select Name</option>
                                        @foreach ($datas as $data)
                                            <option value="{{ $data->name }}">
                                                {{ $data->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-5" style="margin-left:6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="bi bi-funnel-fill"></i></button>
                                <a href="/admin" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form>
                    {{-- <form action="/adminsearchbar" method="GET" style="margin-left:32%" autocomplete="off">
                        <div id="filterDiv1">
                            <div class="col-md-9">
                                <label></label>
                                @if (isset($_GET['query']))
                                    <input type="text" name="query" placeholder="Name/Email" class="form-control"
                                        value="{{ $_GET['query'] }}" required>
                                @else
                                    <input type="text" name="query" placeholder="Name/Email" class="form-control"
                                        required>
                                @endif
                            </div>
                            <div class="col-md-5" style="margin-left: 6px">
                                <br />
                                <button type="submit" class="btn btn-primary btn-sm mt-1"><i
                                        class="fa-solid fa-magnifying-glass"></i></i></button>
                                <a href="/admin" class="btn btn-success btn-sm mt-1"><i
                                        class="fa-solid fa fa-refresh"></i></a>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey;">
                <thead style="text-align:center;">
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Mobile.no</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">
                                @php
                                    $date = $user->created_at; // the date you want to get the financial week number for
                                    $dates = $date->weekOfYear; // the date you want to get the financial week number for
                                    $fiscalYearStart = date('01-04-Y'); // the start date of your fiscal year
                                    // calculate the difference between the date and fiscal year start in days
                                    $diff = strtotime($date) - strtotime($fiscalYearStart);
                                    // calculate the number of weeks between the date and fiscal year start
                                    $weekNumber = ceil($diff / (7 * 24 * 60 * 60));
                                @endphp
                                {{ \Carbon\Carbon::now()->format('y') }}W{{ $weekNumber }}{{ $user->id }}
                            </td>
                            <td style="text-align:center;" class="table_data">{{ ucfirst(strtolower($user->name)) }}
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $user->mobile }}</td>
                            <td style="text-align:center;" class="table_data">
                                <a onclick=" checkadmin({{ $user }})">
                                    <i class="bi bi-pencil-square  btn btn-success btn-sm"></i></a>
                                <a href="/delete/{{ $user->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Delete" onclick="event.preventDefault(); deleteuser('{{ $user->id }}');"><i
                                        class="bi bi-trash-fill btn btn-danger btn-sm"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($users) < 1)
                <div id="dataNotFound">
                    <p>Data not found</p>
                </div>
            @endif
            <div class="active">
                {!! $users->links() !!}
            </div>
        </div>
    </div>
    <div id="sam2">
        <div class="userPopUp2">
            <a href="/admin">
                <h4 style="color:#bf0e3a;float:right;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
            </a>
            <img id="licenseimage" class="rounded-0 border border-secondary" width="600px" height="400px">
        </div>
    </div>
    <div id="sam1">
        <div class="userPopUp1">
            <form action="/updateuserdetails/{id}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div id="userHeading">
                    <h5 class="" style="color:#bf0e3a;"><i class="fa-solid fa-user"></i> Update Admin</h5>
                    <a href="/admin">
                        <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div class="report1">
                    <div class="report">
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Id</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control" id="id" required>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Role</label>
                            <div class="col-sm-9">
                                <select name="role" class="form-select" required>
                                    <option value="Admin">Admin</option>
                                    <option value="User">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name" required>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                        *{{ $message }}
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Gender</label>
                            <div class="col-sm-9">
                                <input type="text" name="gender" class="form-control" id="gender" required>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                            <div class="col-sm-9">
                                <input type="text" name="date_of_birth" class="form-control flatdate"
                                    id="date_of_birth" required>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date_of_birth')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label"> Company</label>
                            <div class="col-sm-9">
                                <input type="text" name="company" class="form-control" id="company" required>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('company')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">Current_Image</label>
                            <div class="col-sm-6">
                                <img id="updateImage" class="rounded-0 border border-secondary" width="50px"
                                    height="50px">
                            </div>
                        </div>
                    </div>
                    <div class="subreport">
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">License</label>
                            <div class="col-sm-9">
                                <input type="file" name="license[]" class="form-control" multiple required>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('license')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2  col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" class="form-control" id="address" required>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('address')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input list="citylist" name="city" class="form-control" id="city" required>
                                <datalist id="citylist">
                                    <option value="London">London</option>
                                    <option ption value="Aberdeen City">Aberdeen City</option>
                                    <option value="Aberdeenshire">Aberdeenshire</option>
                                    <option value="Angus">Angus</option>
                                    <option value="Argyll and Bute">Argyll and Bute</option>
                                    <option value="Clackmannanshire">Clackmannanshire</option>
                                    <option value="Dumfries and Galloway">Dumfries and Galloway</option>
                                    <option value="Dundee City">Dundee City</option>
                                    <option value="East Ayrshire<">East Ayrshire</option>
                                    <option value="East Dunbartonshire">East Dunbartonshire</option>
                                    <option value="East Lothian">East Lothian</option>
                                    <option value="East Renfrewshire">East Renfrewshire</option>
                                    <option value="Edinburgh">Edinburgh</option>
                                    <option value="Eilean Siar">Eilean Siar</option>
                                    <option value="Falkirk">Falkirk</option>
                                    <option value="Fife">Fife</option>
                                    <option value="Glasgow City">Glasgow City</option>
                                    <option value="Highland">Highland</option>
                                    <option value="Inverclyde">Inverclyde</option>
                                    <option value="Midlothian">Midlothian</option>
                                    <option value="Moray">Moray</option>
                                    <option value="North Ayrshire">North Ayrshire</option>
                                    <option value="North Lanarkshire">North Lanarkshire</option>
                                    <option value="Orkney Islands">Orkney Islands</option>
                                    <option value="Perth and Kinross">Perth and Kinross</option>
                                    <option value="Renfrewshire">Renfrewshire</option>
                                    <option value="Scottish Borders">Scottish Borders</option>
                                    <option value="Shetland Islands">Shetland Islands</option>
                                    <option value="South Ayrshire">South Ayrshire</option>
                                    <option value="South Lanarkshire">South Lanarkshire</option>
                                    <option value="Stirling">Stirling</option>
                                    <option value="West Dunbartonshire">West Dunbartonshire</option>
                                    <option value="West Lothian">West Lothian</option>
                                    <option value="Antrim and Newtownabbey">Antrim and Newtownabbey</option>
                                    <option value="Ards and North Down">Ards and North Down</option>
                                    <option value="Armagh City, Banbridge and Craigavon">Armagh City, Banbridge and
                                        Craigavon</option>
                                    <option value="Belfast City">Belfast City</option>
                                    <option value="Causeway Coast and Glens">Causeway Coast and Glens</option>
                                    <option value="Derry and Strabane">Derry and Strabane</option>
                                    <option value="Fermanagh and Omagh">Fermanagh and Omagh</option>
                                    <option value="Lisburn and Castlereagh">Lisburn and Castlereagh</option>
                                    <option value="Mid and East Antrim">Mid and East Antrim</option>
                                    <option value="Mid-Ulster">Mid-Ulster</option>
                                    <option value="Newry, Mourne and Down">Newry, Mourne and Down</option>
                                    <option value="Barking and Dagenham">Barking and Dagenham</option>
                                    <option value="Barnet">Barnet</option>
                                    <option value="Bexley">Bexley</option>
                                    <option value="Brent">Brent</option>
                                    <option value="Bromley">Bromley</option>
                                    <option value="Camden">Camden</option>
                                    <option value="Croydon">Croydon</option>
                                    <option value="Ealing">Ealing</option>
                                    <option value="Enfield">Enfield</option>
                                    <option value="Greenwich">Greenwich</option>
                                    <option value="Hackney">Hackney</option>
                                    <option value="Hammersmith and Fulham">Hammersmith and Fulham</option>
                                    <option value="Haringey">Haringey</option>
                                    <option value="Harrow">Harrow</option>
                                    <option value="Havering">Havering</option>
                                    <option value="Hillingdon">Hillingdon</option>
                                    <option value="Hounslow">Hounslow</option>
                                    <option value="Islington">Islington</option>
                                    <option value="Kensington and Chelsea">Kensington and Chelsea</option>
                                    <option value="Kingston upon Thames">Kingston upon Thames</option>
                                    <option value="Lambeth">Lambeth</option>
                                    <option value="Lewisham">Lewisham</option>
                                    <option value="Merton">Merton</option>
                                    <option value="Newham">Newham</option>
                                    <option value="Redbridge">Redbridge</option>
                                    <option value="Richmond upon Thames">Richmond upon Thames</option>
                                    <option value="Southwark">Southwark</option>
                                    <option value="Sutton">Sutton</option>
                                    <option value="Tower Hamlets">Tower Hamlets</option>
                                    <option value="Waltham Forest">Waltham Forest</option>
                                    <option value="Wandsworth">Wandsworth</option>
                                    <option value="Westminster">Westminster</option>
                                    <option value="Barnsley">Barnsley</option>
                                    <option value="Birmingham">Birmingham</option>
                                    <option value="Bolton">Bolton</option>
                                    <option value="Bradford">Bradford</option>
                                    <option value="Bury">Bury</option>
                                    <option value="Calderdale">Calderdale</option>
                                    <option value="Coventry">Coventry</option>
                                    <option value="Doncaster">Doncaster</option>
                                    <option value="Dudley">Dudley</option>
                                    <option value="Gateshead">Gateshead</option>
                                    <option value="Kirklees">Kirklees</option>
                                    <option value="Knowsley">Knowsley</option>
                                    <option value="Leeds">Leeds</option>
                                    <option value="Liverpool">Liverpool</option>
                                    <option value="Manchester">Manchester</option>
                                    <option value="Newcastle upon Tyne">Newcastle upon Tyne</option>
                                    <option value="North Tyneside">North Tyneside</option>
                                    <option value="Oldham">Oldham</option>
                                    <option value="Rochdale">Rochdale</option>
                                    <option value="Rotherham">Rotherham</option>
                                    <option value="Salford">Salford</option>
                                    <option value="Sandwell">Sandwell</option>
                                    <option value="Sefton">Sefton</option>
                                    <option value="Sheffield">Sheffield</option>
                                    <option value="Solihull">Solihull</option>
                                    <option value="South Tyneside">South Tyneside</option>
                                    <option value="St. Helens">St. Helens</option>
                                    <option value="Stockport">Stockport</option>
                                    <option value="Sunderland">Sunderland</option>
                                    <option value="Tameside">Tameside</option>
                                    <option value="Trafford">Trafford</option>
                                    <option value="Wakefield">Wakefield</option>
                                    <option value="Walsall">Walsall</option>
                                    <option value="Wigan">Wigan</option>
                                    <option value="Wirral">Wirral</option>
                                    <option value="Wolverhampton">Wolverhampton</option>
                                    <option value="Buckinghamshire">Buckinghamshire</option>
                                    <option value="Cambridgeshire">Cambridgeshire</option>
                                    <option value="Cumbria">Cumbria</option>
                                    <option value="Derbyshire">Derbyshire</option>
                                    <option value="Devon">Devon</option>
                                    <option value="Dorset">Dorset</option>
                                    <option value="East Sussex">East Sussex</option>
                                    <option value="Essex">Essex</option>
                                    <option value="Gloucestershire">Gloucestershire</option>
                                    <option value="Hampshire">Hampshire</option>
                                    <option value="Hertfordshire">Hertfordshire</option>
                                    <option value="Kent">Kent</option>
                                    <option value="Lancashire">Lancashire</option>
                                    <option value="Leicestershire">Leicestershire</option>
                                    <option value="Lincolnshire">Lincolnshire</option>
                                    <option value="Norfolk">Norfolk</option>
                                    <option value="North Yorkshire">North Yorkshire</option>
                                    <option value="Northamptonshire">Northamptonshire</option>
                                    <option value="Nottinghamshire">Nottinghamshire</option>
                                    <option value="Oxfordshire">Oxfordshire</option>
                                    <option value="Somerset">Somerset</option>
                                    <option value="Staffordshire">Staffordshire</option>
                                    <option value="Suffolk">Suffolk</option>
                                    <option value="Surrey">Surrey</option>
                                    <option value="Warwickshire">Warwickshire</option>
                                    <option value="West Sussex">West Sussex</option>
                                    <option value="Worcestershire">Worcestershire</option>
                                    <option value="Bath and North East Somerset">Bath and North East Somerset</option>
                                    <option value="Bedford">Bedford</option>
                                    <option value="Blackburn with Darwen">Blackburn with Darwen</option>
                                    <option value="Blackpool">Blackpool</option>
                                    <option value="Blaenau Gwent">Blaenau Gwent</option>
                                    <option value="Bournemouth, Christchurch and Poole">Bournemouth, Christchurch and Poole
                                    </option>
                                    <option value="Bracknell Forest">Bracknell Forest</option>
                                    <option value="Bridgend ">Bridgend </option>
                                    <option value="Brighton and Hove">Brighton and Hove</option>
                                    <option value="Bristol">Bristol</option>
                                    <option value="Caerphilly">Caerphilly </option>
                                    <option value="Cardiff">Cardiff</option>
                                    <option value="Carmarthenshire">Carmarthenshire</option>
                                    <option value="Central Bedfordshire">Central Bedfordshire</option>
                                    <option value="Ceredigion">Ceredigion</option>
                                    <option value="Cheshire East">Cheshire East</option>
                                    <option value="Cheshire West and Chester<">Cheshire West and Chester</option>
                                    <option value="Conwy">Conwy</option>
                                    <option value="Cornwall">Cornwall</option>
                                    <option value="Darlington">Darlington</option>
                                    <option value="Denbighshire">Denbighshire </option>
                                    <option value="Derby">Derby</option>
                                    <option value="Durham, County">Durham, County</option>
                                    <option value="East Riding of Yorkshire">East Riding of Yorkshire</option>
                                    <option value="Flintshire">Flintshire</option>
                                    <option value="Gwynedd">Gwynedd</option>
                                    <option value="Halton">Halton</option>
                                    <option value="Hartlepool">Hartlepool</option>
                                    <option value="Herefordshire">Herefordshire</option>
                                    <option value="Isle of Anglesey">Isle of Anglesey</option>
                                    <option value="Isle of Wight">Isle of Wight</option>
                                    <option value="Isles of Scilly">Isles of Scilly</option>
                                    <option value="Kingston upon Hull">Kingston upon Hull</option>
                                    <option value="Leicester">Leicester</option>
                                    <option value="Luton">Luton</option>
                                    <option value="Medway">Medway</option>
                                    <option value="Merthyr Tydfil ">Merthyr Tydfil </option>
                                    <option value="Middlesbrough">Middlesbrough</option>
                                    <option value="Milton Keynes">Milton Keynes</option>
                                    <option value="Monmouthshire">Monmouthshire </option>
                                    <option value="Neath Port Talbot">Neath Port Talbot </option>
                                    <option value="Newport">Newport</option>
                                    <option value="North East Lincolnshire">North East Lincolnshire</option>
                                    <option value="North Lincolnshire">North Lincolnshire</option>
                                    <option value="North Somerset">North Somerset</option>
                                    <option value="Northumberland">Northumberland</option>
                                    <option value="Nottingham">Nottingham</option>
                                    <option value="Pembrokeshire">Pembrokeshire </option>
                                    <option value="Peterborough">Peterborough</option>
                                    <option value="Plymouth">Plymouth</option>
                                    <option value="Portsmouth">Portsmouth</option>
                                    <option value="Powys">Powys</option>
                                    <option value="Reading">Reading</option>
                                    <option value="Redcar and Cleveland">Redcar and Cleveland</option>
                                    <option value="Rhondda Cynon Taff ">Rhondda Cynon Taff </option>
                                    <option value="Rutland">Rutland</option>
                                    <option value="Shropshire">Shropshire</option>
                                    <option value="Slough">Slough</option>
                                    <option value="South Gloucestershire">South Gloucestershire</option>
                                    <option value="Southampton">Southampton</option>
                                    <option value="Southend-on-Sea">Southend-on-Sea</option>
                                    <option value="Stockton-on-Tees">Stockton-on-Tees</option>
                                    <option value="Stoke-on-Trent">Stoke-on-Trent</option>
                                    <option value="Swansea">Swansea</option>
                                    <option value="Swindon">Swindon</option>
                                    <option value="Telford and Wrekin">Telford and Wrekin</option>
                                    <option value="Thurrock">Thurrock</option>
                                    <option value="Torbay">Torbay</option>
                                    <option value="Torfaen">Torfaen</option>
                                    <option value="Vale of Glamorgan">Vale of Glamorgan</option>
                                    <option value="Warrington">Warrington</option>
                                    <option value="West Berkshire">West Berkshire</option>
                                    <option value="Wiltshire">Wiltshire</option>
                                    <option value="Windsor and Maidenhead">Windsor and Maidenhead</option>
                                    <option value="Wokingham">Wokingham</option>
                                    <option value="Wrexham">Wrexham</option>
                                    <option value="York">York</option>
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2  col-form-label">Postcode</label>
                            <div class="col-sm-9">
                                <input type="text" name="postcode" class="form-control" id="postcode" required>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('postcode')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="" class="col-sm-1  col-form-label">Country</label>
                                <div class="col-sm-9">
                                    <input type="text" name="country" class="form-control" value="United Kingdom"
                                        required>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('country')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="" class="col-sm-2  col-form-label"> Email</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" class="form-control" id="email" required>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label for="" class="col-sm-2 col-form-label"> Mobile</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" class="form-control" id="mobile" required>
                                    <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')
                                            *{{ $message }}
                                        @enderror
                                    </div>
                                    <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                                        id="add" style="float:right;">
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>

@endsection
