@extends('appquery')

@section('content')

	<div class="container">	
		
<!--	导航部分-->
	<div class="row-fluid">
		<div class="span12">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="#">羽毛球</a>
				</li>
				<li>
					<a href="#">乒乓球</a>
				</li>
				<li>
					<a href="#">网球</a>
				</li>
				<li>
					<a href="#">篮球</a>
				</li>
				<li>
					<a href="#">篮球</a>
				</li>
				<li>
					<a href="#">游泳</a>
				</li>
			</ul>
		</div>
	</div>
<!--	导航部分结束-->
		
		
	<div class="row">
		<div class="span12">
			<div class="row">
				<div class="span4">
					<div class="page-header">
						<h1>
							羽毛球场馆<small></small>
						</h1>
					</div>
				</div>
				<div class="span4">
				</div>
				<div class="span4">
				</div>
			</div>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th colspan="1" rowspan="2">
							<strong>场馆名</strong>
						</th>
						<th colspan="3" rowspan="1">
							<strong>日期</strong>
						</th>
					</tr>
					<tr>
						<th>
							<strong>上午</strong>
						</th>
						<th>
							<strong>下午</strong>
						</th>
						<th>
							<strong>晚上</strong>
						</th>
					</tr>
				</thead>
				<tbody>
				    @foreach ($badmintonstates as $badmintonstate)
			      <tr>
			         <td>{{ $badmintonstate->name }}</td>
					 <td>
					   @if ($badmintonstate->morning==0)
					    <form action="{{ URL('booking/badminton/'.$badmintonstate->date.'/morning/'.$badmintonstate->name) }}" method="GET" style="display: inline;">
             				 <input name="_method" type="hidden" value="DELETE">
             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
							 <button type="submit" class="btn btn-primary">预定</button>
          				 </form>
                		@else
                 		<a href="#" class="btn btn-default btn-lg disabled" role="button">已订</a>
              			@endif
					  </td>
					  <td>
					   @if ($badmintonstate->afternoon==0)
					    <form action="{{ URL('booking/badminton/'.$badmintonstate->date.'/afternoon/'.$badmintonstate->name) }}" method="GET" style="display: inline;">
             				 <input name="_method" type="hidden" value="DELETE">
             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
							 <button type="submit" class="btn btn-primary">预定</button>
          				 </form>
                		@else
                 		<a href="#" class="btn btn-default btn-lg disabled" role="button">已订</a>
              			@endif
					  </td>
					 <td>
					   @if ($badmintonstate->evening==0)
					    <form action="{{ URL('booking/badminton/'.$badmintonstate->date.'/evening/'.$badmintonstate->name) }}" method="GET" style="display: inline;">
             				 <input name="_method" type="hidden" value="DELETE">
             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
							 <button type="submit" class="btn btn-primary">预定</button>
          				 </form>
                		@else
                 		<a href="#" class="btn btn-default btn-lg disabled" role="button">已订</a>
              			@endif
					  </td>
			      </tr>
			  @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection