@extends('layouts.admin')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">

                        <h5>Add new flat</h5>

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
                            'action' => 'Admin\FlatController@store',
                            'class' => 'form-horizontal'
                        ]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Flat name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('area', 'Flat area m2', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::number('area', null, ['class' => 'form-control', 'required', 'step' => "0.1"]) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('rooms', 'Num of rooms', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::number('rooms', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Type', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::select('type', $flatTypes, null, ['class' => 'form-control m-b', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('res_complex', 'Res. Complex', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::select('res_complex', $complexes, null, ['class' => 'form-control m-b', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('buildings', 'Buildings', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::select('buildings[]', $buildings, null, ['id' =>'buildings', 'class' => 'form-control m-b', 'multiple', 'required']) !!}
                            </div>
                        </div>


                        {{-- PRICE --}}
                        <div class="form-group">
                            {!! Form::label('price', 'Price (USD)', ['class' => 'col-lg-3 control-label']) !!}

                            <div class="col-lg-9">

                                <div class="input-group">
                                    {!! Form::number('price', null, ['class' => 'form-control', 'required']) !!}

                                    {{-- default type = 'per_m2 --}}
                                    {!! Form::hidden('price_type', 'per_m2', ['id' =>'price_type']) !!}

                                    <div class="input-group-btn">
                                        <button id="price_type_btn" data-toggle="dropdown" class="btn btn-white dropdown-toggle" type="button">
                                            <span id="price_type_text">per m2</span>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a class="price_type_select" data-type="per_m2">per m2</a></li>
                                            <li><a class="price_type_select" data-type="total">Total</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Add a new flat', ['class' => 'btn btn-lg']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    {!! Html::script('js/admin/flats/main.js') !!}
@endsection

