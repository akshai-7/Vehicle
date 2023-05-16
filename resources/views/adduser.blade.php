@extends('layouts.user')
@section('content')
    <div id="userContainer">
        <div class=" mt-4">
            <form action="/createuser" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf
                <div id="userHeading">
                    <h5 class="mt-3" style="color:#bf0e3a;"><i class="fa-solid fa-user"></i> Create Driver</h5>
                    <a href="/user">
                        <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                    </a>
                </div>
                <div class="report1">
                    <div class="report">
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('name')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> Role</label>
                            <div class="col-sm-9">
                                <input type="text" name="role" class="form-control" value="User">
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select name="gender" class="form-select">
                                    <option value="">Select</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('gender')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2  col-form-label"> D.O.B</label>
                            <div class="col-sm-9">
                                <input type="text1" name="date_of_birth" class="form-control flatdate" id="flatate"
                                    placeholder="Select Date">
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
                        <div class="form-group row mt-4 ">
                            <label class="col-sm-2 col-form-label">License</label>
                            <div class="col-sm-9">
                                <input type="file" name="license[]" class="form-control" multiple>
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('license')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2  col-form-label">Address</label>
                            <div class="col-sm-9">
                                <input type="text" name="address" class="form-control" placeholder="House.No/Street">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('address')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="subreport">
                        <div class="form-group row mt-4 ">
                            <label for="" class="col-sm-2 col-form-label">City</label>
                            <div class="col-sm-9">
                                <input list="citylist" name="city" class="form-control" placeholder="Select City" />
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
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('city')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2  col-form-label">Postcode</label>
                            <div class="col-sm-9">
                                <input type="text" name="postcode" class="form-control">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('postcode')
                                        *{{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <label for="" class="col-sm-2  col-form-label">Country</label>
                            <div class="col-sm-9">
                                <input type="text" name="country" class="form-control" value="United Kingdom">
                                <div style="color:rgb(216, 31, 31);font-size:14px;"> @error('country')
                                        *{{ $message }}
                                    @enderror
                                </div>
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
                                <input type="submit" class="btn text-white mt-4"
                                    style="float:right;background:#bf0e3a;">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
