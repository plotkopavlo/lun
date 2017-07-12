@extends('layouts.admin')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
        <div class="col-lg-10 col-lg-offset-1">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>All cities</h5>
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
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Complex name</th>
                            <th>City</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($complexes as $complex)

                            <tr class="info">
                                <td>{{ $complex->id }}</td>
                                <td>{{ $complex->name }}</td>
                                <td>{{ $complex->city->name or '' }}</td>
                                <td class="section-edit">
                                    <a href="{{ url('panel/complexes/' . $complex->id . '/edit')}}">
                                        <button class="btn btn-outline btn-success">edit</button>
                                    </a>
                                </td>
                                <td class="section-delete">
                                    {!! Form::model($complex, ['method' => 'DELETE', 'action' => ['Admin\ResidentialComplexController@destroy', $complex->id]]) !!}
                                    {!! Form::submit('delete', ['class' => 'btn btn-outline btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $complexes->links() }}

            </div>
        </div>
    </div>
@endsection