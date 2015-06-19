<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BNU SPORTS</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	
	<style type="text/css">
	.table th, .table td { 
		text-align: center; 
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">BNU SPORTS</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar">
					<li><a href="{{ URL('query/badminton/0/0/1') }}">场馆查询</a></li>
					<li class="active"><a href="{{ URL('activity') }}">活动信息</a></li>
					<li><a></a></li>
					<li><a></a></li>
					<li><a></a></li>
					<li><a></a></li>
				</ul>
				<ul class="nav navbar-nav navbar-center">
					<li><a href="{{ URL('/') }}">{{ Inspiring::quote() }}</a></li>
				</ul>
				

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
<!--						<li><a href="{{ url('/auth/login') }}">登录</a></li>-->
<!--						<li><a href="{{ url('/auth/register') }}">Register</a></li>-->
					@else
						@if(Auth::user()->usertype==2)
<!--						2代表管理员-->
						<li><a href="{{ URL('query/adminhome/badminton/0/0/1') }}">场馆管理</a></li>
						<li><a href="{{ URL('activity/adminhome') }}">活动管理</a></li>
						@endif
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ URL('info') }}">个人中心</a></li>
								<li><a href="{{ url('/password/email') }}">重置密码</a></li>
								<li class="divider"></li>
								<li><a href="{{ url('/auth/logout') }}">退出登录</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')
	
	
  <div class="container" style="margin-top: 20px;">
    <div id="footer" style="text-align: center; border-top: dashed 3px #eeeeee; margin: 50px 0; padding: 20px;">
      ©2015 <a href="http://araleii.com">Araleii</a>
    </div>
  </div>


	<!-- Scripts -->
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>-->
</body>
</html>
