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

                    <h5>All Flats</h5>

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
                            <th>Flat name</th>
                            {{--<th>Address</th>--}}
                            <th>Description</th>
                            <th>Rooms</th>
                            <th>Area</th>
                            <th>Price (USD)</th>
                            <th>Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flats as $flat)

                            <tr class="info">
                                <td>{{ $flat->id }}</td>
                                <td>{{ $flat->name }}</td>
                                {{--<td>{{ $flat->buildings()->first()->address or '' }}</td>--}}
                                <td>{!! $flat->description !!}</td>
                                <td>{{ $flat->num_of_rooms }}</td>
                                <td>{{ $flat->area_m2 }}</td>
                                <td>{{ $flat->price_per_m2 or $flat->price_total }}</td>
                                <td>{{ $flat->type->name or '' }}</td>

                                <td class="section-edit">
                                    <a href="{{ url('panel/flats/' . $flat->id . '/edit')}}">
                                        <button class="btn btn-outline btn-success">edit</button>
                                    </a>
                                </td>
                                <td class="section-delete">
                                    {!! Form::model($flat, ['method' => 'DELETE', 'action' => ['Admin\FlatController@destroy', $flat->id]]) !!}
                                    {!! Form::submit('delete', ['class' => 'btn btn-outline btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $flats->links() }}

            </div>
        </div>
    </div>
@endsection