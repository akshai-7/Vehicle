@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updateassignPopup">
                <form action="#" method="POST" autocomplete="off">
                    @csrf
                    <div id="userHeading">
                        <h4 style="margin-top: 2%">
                            Report an Incident
                        </h4>
                        <a href="/reportlist">
                            <h4 style="color:#bf0e3a;"> <i class="fa-sharp fa-regular fa-circle-xmark"></i></h4>
                        </a>
                    </div>
                    @foreach ($report as $report)
                        <div class="incident">
                            <div class="form-group row mt-4">
                                <label class="col-sm-2">Assign_ID</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->id }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 ">Date</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->date }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2">Location</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->location }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 "> Witnessed_by</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->witnessed_by }}</p>

                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 ">Mobile.no</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->mobile }}</p>

                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 ">Image</label>
                                <div class="col-sm-9">
                                    @foreach (explode(',', $report->image) as $image)
                                        <img src="{{ url('images/' . $image) }}" class="rounded-0 border border-secondary"
                                            width="80px" height="80px">
                                        <span></span>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
