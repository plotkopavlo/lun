@extends('layouts.app')

@section('content')
<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name">LN</h1>
        </div>

        <h3>REGISTER NEW ADMIN</h3>

        <form class="m-t" role="form"  method="POST" action="{{ route('register') }}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Name" required="">
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email" required="">
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
            </div>

            <div class="form-group">
                <input type="password" name="password_confirmation" id="password" class="form-control" placeholder="Password confirmation" required="">
            </div>

            <button type="submit" class="btn btn-primary block full-width m-b">Register</button>
        </form>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>
@endsection
