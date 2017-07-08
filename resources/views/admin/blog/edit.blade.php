@extends('layouts.admin')

@section('content')

    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Form to update blog</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        {!! Form::model($blog, ['method' => 'PATCH', 'action' => ['Admin\BlogController@update', $blog->id],
                        'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group">
                            {!! Form::label('title', 'Enter the name of the blog', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('body', 'Some text', ['class' => 'col-lg-3 control-label']) !!}
                            <div class="col-lg-9">
                                {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'summernote']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-9">
                                {!! Form::submit('Update blog', ['class' => 'btn btn-lg']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection