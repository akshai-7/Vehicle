@extends('layouts.user')
@section('content')
    <div class="userContainer">
        <div id="updatePopup" class="table-data">
            <div class="updateassignPopup">
                <form action="#" method="POST" autocomplete="off">
                    @csrf
                    <a href="/reportlist" style="color:black;"><i class="fa-solid fa-xmark"></i></a>
                    <h5 class=""> Report an Incident</h5>
                    @foreach ($report as $report)
                        <div class="incident">
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 col-form-label">Assign_ID</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->id }}</p>

                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <label class="col-sm-2 col-form-label">Date</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->date }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 col-form-label">Location</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->location }}</p>
                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 col-form-label"> Witnessed_by</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->witnessed_by }}</p>

                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 col-form-label">Mobile.no</label>
                                <div class="col-sm-9">
                                    <p>{{ $report->mobile }}</p>

                                </div>
                            </div>
                            <div class="form-group row mt-4 ">
                                <label class="col-sm-2 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <img src="{{ url('images/' . $report->image) }}"
                                        class="rounded-0 border border-secondary" width="70px" height="70px">

                                </div>
                            </div>
                        </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
@endsection
