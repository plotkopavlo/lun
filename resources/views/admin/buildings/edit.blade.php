@extends('layouts.admin')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Update building</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        {!! Form::model($building, ['method' => 'PATCH', 'action' => ['Admin\BuildingController@update', $building->id],
                        'class' => 'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('address', 'Address', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('address', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('complex', 'Complexes', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::select('complex', $complexes, $selectedComplex, ['class' => 'form-control m-b', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Update complex', ['class' => 'btn btn-lg']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5>Street View</h5>
                    </div>
                    <div class="ibox-content">
                        <p>
                            Street View in Google maps.
                        </p>
                        <div class="google-map" id="pano" style="height: 500px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span id="coord-lat" data-lat="{{ $building->lat }}"></span>
    <span id="coord-lon" data-lon="{{ $building->lon }}"></span>
@endsection

@section('js')
    {{-- TODO: organize assets, put key in config --}}
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKVFfkBnHYZdWkPgOE9OtPyfpJ20ZB8cI"></script>

    <script>

        var coordLat = $("#coord-lat").attr("data-lat");
        var coordLon = $("#coord-lon").attr("data-lon");

        google.maps.event.addDomListener(window, 'load', init);

        function init() {

            var fenway = new google.maps.LatLng(coordLat, coordLon);

            var panoramaOptions = {
                position: fenway,
                pov: {
                    heading: 10,
                    pitch: 10
                }
            };
            var panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'), panoramaOptions);
        }
    </script>
@endsection