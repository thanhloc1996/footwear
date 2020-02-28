<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/bootstrap4/bootstrap.min.css">
<link href="{{asset('/template/frontend/')}}/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="{{asset('/template/frontend/')}}/dist/AdminLTE.min.css">
@extends('frontend.master')
@section('content')
@include('frontend.element.user.register')
@endsection
<script src="{{asset('/template/frontend/')}}/js/jquery-3.3.1.min.js"></script>

@section('javascript')
<script src="{{asset('/template/frontend/')}}/js/users/user.js"></script>
@endsection
