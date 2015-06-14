@extends('appgym')

@section('content')
	<div class="container">	


<!--	导航部分-->
	<div class="row-fluid">
		<div class="span12">
			<ul class="nav nav-tabs">
				<li class="active">
					<a href="{{ URL('query/badminton/0') }}">羽毛球</a>
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
					<a href="#">足球</a>
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
					<div class="page-header"  style="display: inline;">
						<h1>
							羽毛球场馆
							<a href="{{ URL('query/gymadmin/badminton/create') }}" class="btn btn-large btn-success">+场馆</a>
						</h1>
					</div>
						 @if (count($errors) > 0)
						   <div class="alert alert-danger">
						    <strong>Whoops!</strong> There were some problems.<br><br>
						    <ul>
						     @foreach ($errors->all() as $error)
						      <li>{{ $error }}</li>
						     @endforeach
						    </ul>
						   </div>
						  @endif
				</div>
				<div class="span4">
<!--	日期导航部分开始-->
					<ul class="nav nav-pills">
					@for ($i = 0; $i < $totalday; $i++)
					    @if($offset==$i)
						<li class="active"><a style="cursor:pointer;" href="{{ URL('query/adminhome/badminton/'.$i) }}">{{ $days[$i] }}</a></li>
						@else
						<li><a style="cursor:pointer;" href="{{ URL('query/adminhome/badminton/'.$i) }}">{{ $days[$i] }}</a></li>
						@endif
					@endfor
					</ul>
<!--	日期导航部分结束-->
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
					 
					   @if ($badmintonstate->morning==0)
					   <td class="success">
					    <form action="{{  URL('query/gymadmin/badminton/'.$badmintonstate->id) }}" method="POST" style="display: inline;">
             				 <input name="_method" type="hidden" value="PUT">
             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
							  <input type="hidden" name="changetype" value="lock">
							  <input type="hidden" name="time" value="morning">
							 <button type="submit" class="btn btn-warning">锁定</button>
          				 </form>
					  </td>
                		@elseif($badmintonstate->morning==2)
					  <td class="danger">
						<a href="#" class="btn btn-default disabled" role="button">已订</a>
					  </td>
						@else
					  <td class="warning">
						 <form action="{{ URL('query/gymadmin/badminton/'.$badmintonstate->id) }}" method="POST" style="display: inline;">
             				 <input name="_method" type="hidden" value="PUT">
             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	 						 <input type="hidden" name="changetype" value="unlock">
							 <input type="hidden" name="time" value="morning">
							 <button type="submit" class="btn btn-info">解锁</button>
          				 </form>  
					  </td>
              			@endif
						@if ($badmintonstate->afternoon==0)
					   <td class="success">
					    <form action="{{  URL('query/gymadmin/badminton/'.$badmintonstate->id) }}" method="POST" style="display: inline;">
             				 <input name="_method" type="hidden" value="PUT">
             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
							  <input type="hidden" name="changetype" value="lock">
							  <input type="hidden" name="time" value="afternoon">
							 <button type="submit" class="btn btn-warning">锁定</button>
          				 </form>
					  </td>
						@elseif($badmintonstate->afternoon==2)
					  <td class="danger">
						<a href="#" class="btn btn-default disabled" role="button">已订</a>
					  </td>
                		@else
					  <td class="warning">
						 <form action="{{ URL('query/gymadmin/badminton/'.$badmintonstate->id) }}" method="POST" style="display: inline;">
             				 <input name="_method" type="hidden" value="PUT">
             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	 						 <input type="hidden" name="changetype" value="unlock">
							 <input type="hidden" name="time" value="afternoon">
							 <button type="submit" class="btn btn-info">解锁</button>
          				 </form>  
					  </td>
              			@endif
						@if ($badmintonstate->evening==0)
					   <td class="success">
					    <form action="{{  URL('query/gymadmin/badminton/'.$badmintonstate->id) }}" method="POST" style="display: inline;">
             				 <input name="_method" type="hidden" value="PUT">
             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
							  <input type="hidden" name="changetype" value="lock">
							  <input type="hidden" name="time" value="evening">
							 <button type="submit" class="btn btn-warning">锁定</button>
          				 </form>
					  </td>
					  @elseif($badmintonstate->evening==2)
					 <td class="danger">
						<a href="#" class="btn btn-default disabled" role="button">已订</a>
					  </td>
                	  @else
					  <td class="warning">
						 <form action="{{ URL('query/gymadmin/badminton/'.$badmintonstate->id) }}" method="POST" style="display: inline;">
             				 <input name="_method" type="hidden" value="PUT">
             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	 						 <input type="hidden" name="changetype" value="unlock">
							 <input type="hidden" name="time" value="evening">
							 <button type="submit" class="btn btn-info">解锁</button>
          				 </form>  
					  </td>
              			@endif
					
					  
			      </tr>
			  @endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


@endsection