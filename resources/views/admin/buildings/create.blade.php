@extends('layouts.admin')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <h5>Create new building</h5>

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
                        {!! Form::open([
                            'action' => 'Admin\BuildingController@store',
                            'class' => 'form-horizontal',
                        ]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Building name', ['class' => 'col-lg-3 control-label']) !!}
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
                            {!! Form::label('complex', 'Complex', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::select('complex', $complexes, null, ['class' => 'form-control m-b', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Add new building', ['class' => 'btn btn-lg']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

