@extends('layouts.admin')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Update flat data</h5>
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

                        {!! Form::model($flat, ['method' => 'PATCH', 'action' => [
                            'Admin\FlatController@update', $flat->id],
                            'class' => 'form-horizontal'])
                        !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Flat name', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('name', $flat->name, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('description', $flat->description, ['class' => 'form-control', 'id' => 'summernote']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('area', 'Flat area m2', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::number('area', $flat->area_m2, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('rooms', 'Num of rooms', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::number('rooms', $flat->num_of_rooms, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('type', 'Type', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::select('type', $flatTypes, $flatTypeSelected, ['class' => 'form-control m-b']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('res_complex', 'Res. Complex', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::select('res_complex', $complexes, $resComplexSelected, ['class' => 'form-control m-b']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('buildings', 'Buildings', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::select('buildings[]', $buildings, null, ['id' =>'buildings', 'class' => 'form-control m-b', 'multiple']) !!}
                            </div>
                        </div>


                        {{-- PRICE --}}
                        <div class="form-group">
                            {!! Form::label('price', 'Price (USD)', ['class' => 'col-lg-3 control-label']) !!}

                            <div class="col-lg-9">

                                <div class="input-group">
                                    {!! Form::number('price', $flatPrice, ['class' => 'form-control']) !!}

                                    {{-- default type = 'per_m2 --}}
                                    {!! Form::hidden('price_type', $flatPriceType, ['id' =>'price_type']) !!}

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
                                {!! Form::submit('Save changes', ['class' => 'btn btn-lg']) !!}
                            </div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
