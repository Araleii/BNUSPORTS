@extends('_layouts.default')

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
	</div> 	
	<hr>
	<div id="content">
		
<!--		<ul>
			@foreach ($pages as $page)
			<li style="margin: 50px 0;">
				<div class="title">
					<a href="{{ URL('pages/'.$page->id) }}">
						<h4>{{ $page->title }}</h4>
					</a>
				</div>
				<div class="body">
					<p>{{ $page->body }}</p>
				</div>
			</li>
			@endforeach
		</ul>-->
	</div>
@endsection