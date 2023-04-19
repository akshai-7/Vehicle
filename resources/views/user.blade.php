@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Driver Details</h3>
                    <a style="margin-right:20px;"><input type="submit" value="Add-Driver" id="add"
                            onclick="show('sam')"></a>
                </div>
                <form action="/users" method="GET" autocomplete="off">
                    <div id="filterDiv1">
                        <div class="col-md-3" id="filter">
                            <label></label>
                            @if (isset($_GET['date']))
                                <input type="date" name="date" class="form-control" value="{{ $_GET['date'] }}">
                            @else
                                <input type="date" name="date" class="form-control">
                            @endif
                        </div>
                        <div class="col-md-3" id="">
                            <label></label>
                            <select class="form-select form-control" name="name">
                                @if (isset($_GET['name']))
                                    <option value="{{ $_GET['name'] }}">{{ $_GET['name'] }}</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}">
                                            {{ $user->name }}</option>
                                    @endforeach
                                @else
                                    <option>Select Name</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->name }}">
                                            {{ $user->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-5" style="margin-left: 6px">
                            <br />
                            <button type="submit" class="btn btn-primary btn-sm mt-1"><i class="fa fa-filter"></i></button>
                            <a href="/user" class="btn btn-success btn-sm mt-1"><i
                                    class="fa-solid fa-arrow-rotate-right"></i></a>
                        </div>

                    </div>
                </form>
            </div>
            <table class="table table-bordered mt-3" style="border: 1px solid lightgrey">
                <thead>
                    <th style="text-align:center;">S.No</th>
                    <th style="text-align:center;">Driver Name</th>
                    <th style="text-align:center;">Email</th>
                    <th style="text-align:center;">Mobile.no</th>
                    <th style="text-align:center;">Address</th>
                    <th style="text-align:center;">Company</th>
                    <th style="text-align:center;">Role</th>
                    <th style="text-align:center;">Creation Date</th>
                    <th style="text-align:center;">Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="table_row">
                            <td style="text-align:center;" class="table_data">{{ $loop->iteration }}</td>
                            <td style="text-align:center;" class="table_data">{{ ucfirst(strtolower($user->name)) }}
                            </td>
                            <td style="text-align:center;" class="table_data">{{ $user->email }}</td>
                            <td style="text-align:center;" class="table_data">{{ $user->mobile }}</td>
                            <td style="text-align:center;" class="table_data">{{ $user->address }}</td>
                            <td style="text-align:center;" class="table_data">{{ $user->company }}</td>
                            <td style="text-align:center;" class="table_data">{{ $user->role }}</td>
                            <td style="text-align:center;" class="table_data">
                                {{ $user->created_at->format('Y-m-d') }}</td>
                            <td style="text-align:center;" class="table_data">
                                <a onclick=" check({{ $user }})"><i
                                        class="fa-solid fa-edit btn btn-success"></i></a>
                                <a href="/delete/{{ $user->id }}" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fa-solid fa-trash btn btn-danger"></i></a>
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
                {{-- {!! $users->links() !!} --}}
            </div>
        </div>
    </div>
    <div id="sam">
        <div class="userPopUp">
            <form action="/createuser" method="POST" autocomplete="off">
                @csrf
                <div id="userHeading">
                    <h5 class="" style="color:#bf0e3a;"><i class="fa-solid fa-user"></i> Create Driver</h5>
                    <a onclick="hide('sam')">
                        <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div class="report1">
                    <div class="report">
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" required>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <input type="text" name="gender" class="form-control" value="Male">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                            <div class="col-sm-9">
                                <input type="Date" name="date_of_birth" class="form-control">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date_of_birth')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label"> Company</label>
                            <div class="col-sm-9">
                                <input type="text" name="company" class="form-control" value="M&D foundations">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('company')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="subreport">

                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label"> Address</label>
                            <div class="col-sm-9">
                                <select class="select" id="select" name="address">
                                    <option>Select City</option>
                                    <!--- United Kingdom states -->
                                    <option value="LND">London</option>
                                    <option value="ABE">Aberdeen City</option>
                                    <option value="ABD">Aberdeenshire</option>
                                    <option value="ANS">Angus</option>
                                    <option value="AGB">Argyll and Bute</option>
                                    <option value="CLK">Clackmannanshire</option>
                                    <option value="DGY">Dumfries and Galloway</option>
                                    <option value="DND">Dundee City</option>
                                    <option value="EAY">East Ayrshire</option>
                                    <option value="EDU">East Dunbartonshire</option>
                                    <option value="ELN">East Lothian</option>
                                    <option value="ERW">East Renfrewshire</option>
                                    <option value="EDH">Edinburgh, City of</option>
                                    <option value="ELS">Eilean Siar</option>
                                    <option value="FAL">Falkirk</option>
                                    <option value="FIF">Fife</option>
                                    <option value="GLG">Glasgow City</option>
                                    <option value="HLD">Highland</option>
                                    <option value="IVC">Inverclyde</option>
                                    <option value="MLN">Midlothian</option>
                                    <option value="MRY">Moray</option>
                                    <option value="NAY">North Ayrshire</option>
                                    <option value="NLK">North Lanarkshire</option>
                                    <option value="ORK">Orkney Islands</option>
                                    <option value="PKN">Perth and Kinross</option>
                                    <option value="RFW">Renfrewshire</option>
                                    <option value="SCB">Scottish Borders</option>
                                    <option value="ZET">Shetland Islands</option>
                                    <option value="SAY">South Ayrshire</option>
                                    <option value="SLK">South Lanarkshire</option>
                                    <option value="STG">Stirling</option>
                                    <option value="WDU">West Dunbartonshire</option>
                                    <option value="WLN">West Lothian</option>
                                    <option value="ANN">Antrim and Newtownabbey</option>
                                    <option value="AND">Ards and North Down</option>
                                    <option value="ABC">Armagh City, Banbridge and Craigavon</option>
                                    <option value="BFS">Belfast City</option>
                                    <option value="CCG">Causeway Coast and Glens</option>
                                    <option value="DRS">Derry and Strabane</option>
                                    <option value="FMO">Fermanagh and Omagh</option>
                                    <option value="LBC">Lisburn and Castlereagh</option>
                                    <option value="MEA">Mid and East Antrim</option>
                                    <option value="MUL">Mid-Ulster</option>
                                    <option value="NMD">Newry, Mourne and Down</option>
                                    <option value="BDG">Barking and Dagenham</option>
                                    <option value="BNE">Barnet</option>
                                    <option value="BEX">Bexley</option>
                                    <option value="BEN">Brent</option>
                                    <option value="BRY">Bromley</option>
                                    <option value="CMD">Camden</option>
                                    <option value="CRY">Croydon</option>
                                    <option value="EAL">Ealing</option>
                                    <option value="ENF">Enfield</option>
                                    <option value="GRE">Greenwich</option>
                                    <option value="HCK">Hackney</option>
                                    <option value="HMF">Hammersmith and Fulham</option>
                                    <option value="HRY">Haringey</option>
                                    <option value="HRW">Harrow</option>
                                    <option value="HAV">Havering</option>
                                    <option value="HIL">Hillingdon</option>
                                    <option value="HNS">Hounslow</option>
                                    <option value="ISL">Islington</option>
                                    <option value="KEC">Kensington and Chelsea</option>
                                    <option value="KTT">Kingston upon Thames</option>
                                    <option value="LBH">Lambeth</option>
                                    <option value="LEW">Lewisham</option>
                                    <option value="MRT">Merton</option>
                                    <option value="NWM">Newham</option>
                                    <option value="RDB">Redbridge</option>
                                    <option value="RIC">Richmond upon Thames</option>
                                    <option value="SWK">Southwark</option>
                                    <option value="STN">Sutton</option>
                                    <option value="TWH">Tower Hamlets</option>
                                    <option value="WFT">Waltham Forest</option>
                                    <option value="WND">Wandsworth</option>
                                    <option value="WSM">Westminster</option>
                                    <option value="BNS">Barnsley</option>
                                    <option value="BIR">Birmingham</option>
                                    <option value="BOL">Bolton</option>
                                    <option value="BRD">Bradford</option>
                                    <option value="BUR">Bury</option>
                                    <option value="CLD">Calderdale</option>
                                    <option value="COV">Coventry</option>
                                    <option value="DNC">Doncaster</option>
                                    <option value="DUD">Dudley</option>
                                    <option value="GAT">Gateshead</option>
                                    <option value="KIR">Kirklees</option>
                                    <option value="KWL">Knowsley</option>
                                    <option value="LDS">Leeds</option>
                                    <option value="LIV">Liverpool</option>
                                    <option value="MAN">Manchester</option>
                                    <option value="NET">Newcastle upon Tyne</option>
                                    <option value="NTY">North Tyneside</option>
                                    <option value="OLD">Oldham</option>
                                    <option value="RCH">Rochdale</option>
                                    <option value="ROT">Rotherham</option>
                                    <option value="SLF">Salford</option>
                                    <option value="SAW">Sandwell</option>
                                    <option value="SFT">Sefton</option>
                                    <option value="SHF">Sheffield</option>
                                    <option value="SOL">Solihull</option>
                                    <option value="STY">South Tyneside</option>
                                    <option value="SHN">St. Helens</option>
                                    <option value="SKP">Stockport</option>
                                    <option value="SND">Sunderland</option>
                                    <option value="TAM">Tameside</option>
                                    <option value="TRF">Trafford</option>
                                    <option value="WKF">Wakefield</option>
                                    <option value="WLL">Walsall</option>
                                    <option value="WGN">Wigan</option>
                                    <option value="WRL">Wirral</option>
                                    <option value="WLV">Wolverhampton</option>
                                    <option value="BKM">Buckinghamshire</option>
                                    <option value="CAM">Cambridgeshire</option>
                                    <option value="CMA">Cumbria</option>
                                    <option value="DBY">Derbyshire</option>
                                    <option value="DEV">Devon</option>
                                    <option value="DOR">Dorset</option>
                                    <option value="ESX">East Sussex</option>
                                    <option value="ESS">Essex</option>
                                    <option value="GLS">Gloucestershire</option>
                                    <option value="HAM">Hampshire</option>
                                    <option value="HRT">Hertfordshire</option>
                                    <option value="KEN">Kent</option>
                                    <option value="LAN">Lancashire</option>
                                    <option value="LEC">Leicestershire</option>
                                    <option value="LIN">Lincolnshire</option>
                                    <option value="NFK">Norfolk</option>
                                    <option value="NYK">North Yorkshire</option>
                                    <option value="NTH">Northamptonshire</option>
                                    <option value="NTT">Nottinghamshire</option>
                                    <option value="OXF">Oxfordshire</option>
                                    <option value="SOM">Somerset</option>
                                    <option value="STS">Staffordshire</option>
                                    <option value="SFK">Suffolk</option>
                                    <option value="SRY">Surrey</option>
                                    <option value="WAR">Warwickshire</option>
                                    <option value="WSX">West Sussex</option>
                                    <option value="WOR">Worcestershire</option>
                                    <option value="BAS">Bath and North East Somerset</option>
                                    <option value="BDF">Bedford</option>
                                    <option value="BBD">Blackburn with Darwen</option>
                                    <option value="BPL">Blackpool</option>
                                    <option value="BGW">Blaenau Gwent</option>
                                    <option value="BCP">Bournemouth, Christchurch and Poole</option>
                                    <option value="BRC">Bracknell Forest</option>
                                    <option value="BGE">Bridgend [Pen-y-bont ar Ogwr GB-POG]</option>
                                    <option value="BNH">Brighton and Hove</option>
                                    <option value="BST">Bristol, City of</option>
                                    <option value="CAY">Caerphilly [Caerffili GB-CAF]</option>
                                    <option value="CRF">Cardiff [Caerdydd GB-CRD]</option>
                                    <option value="CMN">Carmarthenshire [Sir Gaerfyrddin GB-GFY]</option>
                                    <option value="CBF">Central Bedfordshire</option>
                                    <option value="CGN">Ceredigion [Sir Ceredigion]</option>
                                    <option value="CHE">Cheshire East</option>
                                    <option value="CHW">Cheshire West and Chester</option>
                                    <option value="CWY">Conwy</option>
                                    <option value="CON">Cornwall</option>
                                    <option value="DAL">Darlington</option>
                                    <option value="DEN">Denbighshire [Sir Ddinbych GB-DDB]</option>
                                    <option value="DER">Derby</option>
                                    <option value="DUR">Durham, County</option>
                                    <option value="ERY">East Riding of Yorkshire</option>
                                    <option value="FLN">Flintshire [Sir y Fflint GB-FFL]</option>
                                    <option value="GWN">Gwynedd</option>
                                    <option value="HAL">Halton</option>
                                    <option value="HPL">Hartlepool</option>
                                    <option value="HEF">Herefordshire</option>
                                    <option value="AGY">Isle of Anglesey [Sir Ynys Môn GB-YNM]</option>
                                    <option value="IOW">Isle of Wight</option>
                                    <option value="IOS">Isles of Scilly</option>
                                    <option value="KHL">Kingston upon Hull</option>
                                    <option value="LCE">Leicester</option>
                                    <option value="LUT">Luton</option>
                                    <option value="MDW">Medway</option>
                                    <option value="MTY">Merthyr Tydfil [Merthyr Tudful GB-MTU]</option>
                                    <option value="MDB">Middlesbrough</option>
                                    <option value="MIK">Milton Keynes</option>
                                    <option value="MON">Monmouthshire [Sir Fynwy GB-FYN]</option>
                                    <option value="NTL">Neath Port Talbot [Castell-nedd Port Talbot GB-CTL]</option>
                                    <option value="NWP">Newport [Casnewydd GB-CNW]</option>
                                    <option value="NEL">North East Lincolnshire</option>
                                    <option value="NLN">North Lincolnshire</option>
                                    <option value="NSM">North Somerset</option>
                                    <option value="NBL">Northumberland</option>
                                    <option value="NGM">Nottingham</option>
                                    <option value="PEM">Pembrokeshire [Sir Benfro GB-BNF]</option>
                                    <option value="PTE">Peterborough</option>
                                    <option value="PLY">Plymouth</option>
                                    <option value="POR">Portsmouth</option>
                                    <option value="POW">Powys</option>
                                    <option value="RDG">Reading</option>
                                    <option value="RCC">Redcar and Cleveland</option>
                                    <option value="RCT">Rhondda Cynon Taff [Rhondda CynonTaf]</option>
                                    <option value="RUT">Rutland</option>
                                    <option value="SHR">Shropshire</option>
                                    <option value="SLG">Slough</option>
                                    <option value="SGC">South Gloucestershire</option>
                                    <option value="STH">Southampton</option>
                                    <option value="SOS">Southend-on-Sea</option>
                                    <option value="STT">Stockton-on-Tees</option>
                                    <option value="STE">Stoke-on-Trent</option>
                                    <option value="SWA">Swansea [Abertawe GB-ATA]</option>
                                    <option value="SWD">Swindon</option>
                                    <option value="TFW">Telford and Wrekin</option>
                                    <option value="THR">Thurrock</option>
                                    <option value="TOB">Torbay</option>
                                    <option value="TOF">Torfaen [Tor-faen]</option>
                                    <option value="VGL">Vale of Glamorgan, The [Bro Morgannwg GB-BMG]</option>
                                    <option value="WRT">Warrington</option>
                                    <option value="WBK">West Berkshire</option>
                                    <option value="WIL">Wiltshire</option>
                                    <option value="WNM">Windsor and Maidenhead</option>
                                    <option value="WOK">Wokingham</option>
                                    <option value="WRX">Wrexham [Wrecsam GB-WRC]</option>
                                    <option value="YOR">York</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2  col-form-label"> Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" name="password" class="form-control">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('password')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label"> Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" name="mobile" class="form-control">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('mobile')
                                        *{{ $message }}
                                    @enderror
                                </div>
                                <input type="submit" name="" value="Submit" class="btn text-white mt-4"
                                    style="float:right;background:#bf0e3a;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="sam1">
        <div class="userPopUp1">
            <form action="/updateuserdetails/{id}" method="POST" autocomplete="off">
                @csrf
                <div id="userHeading">
                    <h5 class="" style="color:#bf0e3a;"><i class="fa-solid fa-user"></i> Update Driver</h5>
                    <a href="/user">
                        <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>

                <div class="report1">
                    <div class="report">
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Id</label>
                            <div class="col-sm-9">
                                <input type="text" name="id" class="form-control" id="id">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('id')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="name">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Gender</label>
                            <div class="col-sm-9">
                                <input type="text" name="gender" class="form-control" id="gender">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                            <div class="col-sm-9">
                                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('date_of_birth')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="subreport">
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label"> Company</label>
                            <div class="col-sm-9">
                                <input type="text" name="company" class="form-control" id="company">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('company')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label"> Address</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" class="form-control" id="address">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('address')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2  col-form-label"> Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="email">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('email')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label"> Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" name="mobile" class="form-control" id="mobile">
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
    <script>
        $(document).ready(function() {
            var multipleCancelButton = new Choices('#select')
        });
    </script>

@endsection
