<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bygimotic | Dashboard</title>
    {!! Html::style('admin/css/bootstrap.css') !!}
    {!! Html::style('admin/font-awesome/css/font-awesome.css') !!}
    {!! Html::style('admin/css/plugins/morris/morris-0.4.3.min.css') !!}
    {!! Html::style('admin/css/plugins/summernote/summernote.css') !!}
    {!! Html::style('admin/css/plugins/summernote/summernote-bs3.css') !!}
    {!! Html::style('admin/css/plugins/dropzone/dropzone.css') !!}
    {!! Html::style('admin/css/animate.css') !!}
    {!! Html::style('admin/css/style.css') !!}
    {!! Html::style('admin/css/slick.css') !!}
    {!! Html::style('admin/css/slick-theme.css') !!}
    {!! Html::style('admin/css/app.css') !!}
</head>
<body>
    @include('layouts.sidebar')
    <div id="page-wrapper" class="gray-bg">
        @include('layouts.sidebar-top')
        @yield('content')
    </div>
    {!! Html::script('admin/js/jquery-2.1.1.js') !!}
    {!! Html::script('admin/js/bootstrap.min.js') !!}
    {!! Html::script('admin/js/plugins/metisMenu/jquery.metisMenu.js') !!}
    {!! Html::script('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}
    {!! Html::script('admin/js/inspinia.js') !!}
    {!! Html::script('admin/js/plugins/pace/pace.min.js') !!}
    {!! Html::script('admin/js/plugins/summernote/summernote.min.js') !!}
    {!! Html::script('admin/js/admin.js') !!}
    {!! Html::script('admin/js/plugins/slick/slick.min.js') !!}
    {!! Html::script('admin/js/plugins/dropzone/dropzone.js') !!}

    @yield('js')
</body>
</html>