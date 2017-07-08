@extends('layouts.admin')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Все блоги</h5>
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
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Название блога</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($blogs as $blog)
                            <tr class="info">
                                <td>{{$blog -> id}}</td>
                                <td>{{$blog -> title}}</td>
                                <td class="section-edit">
                                    <a href="{{ url('dashboard/blog/'. $blog -> id . '/edit')}}">
                                        <button class="btn btn-outline btn-success">edit</button>
                                    </a>
                                </td>
                                <td class="section-delete">
                                    {!! Form::model($blog, ['method' => 'DELETE', 'action' => ['Admin\BlogController@destroy', $blog->id]]) !!}
                                    {!! Form::submit('delete', ['class' => 'btn btn-outline btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection