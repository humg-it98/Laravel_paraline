@extends('layout.admin')
@section('admin_content')
    <p>Xin chao ban <b style="font-size: 20px">{{Auth::user()->name}}</b></p>
    <img src="{{asset('/admin/home.png')}}" alt="Girl in a jacket" width="1100px" height="400px">
@endsection
