@extends('app')

@section('content')
	<div id="title" style="text-align: center;">
		<h1>BNU SPORTS</h1>
		<div style="padding: 5px; font-size: 16px;">{{ Inspiring::quote() }}</div>
	</div>
	<div id = "navigation" style="text-align: center;">
		<a href="{{ URL('query') }}" class="btn btn-info">场馆查询</a>
		<a href="{{ URL('query') }}" class="btn btn-info">活动信息</a>
		<a href="{{ URL('query') }}" class="btn btn-info">个人中心</a>
		<a href="{{ URL('query') }}" class="btn btn-info">场馆管理</a>
		@if(Auth::guest())
<!--		<a href="{{ URL('auth/login') }}" class="btn btn-info">登录</a>-->
		@else
<!--		<h1>Username</h1>-->
		@endif	
	</div> 	
	<hr>
@endsection