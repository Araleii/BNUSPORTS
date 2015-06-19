@extends('app')

@section('content')


<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h3>
				{{Auth::user()->name}}的申请
			</h3>
			<hr/>
			<div class="row clearfix">
				<div class="col-md-2 column">
				</div>
				<div class="col-md-9 column">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>
									申请号
								</th>
								<th>
									场地类型
								</th>
								<th>
									日期
								</th>
								<th>
									时间段
								</th>
								<th>
									申请状态
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($applications as $app)
						  <tr>
							 <td>
								 {{ $app->id }}
							 </td>
							  <td>
							 @if($app->type=='basketball')
							 {{ '篮球场' }}
							 @elseif($app->type=='football')
							 {{ '足球场' }}
							 @else
							 {{ '游泳' }}
							 @endif
							 </td>
							 <td>
								 {{ $app->date }}
							 </td>
							 <td>
								 {{ $app->begintime }}点到{{ $app->endtime }}点
							 </td>
							 @if($app->enable==1)
								 @if($app->type!='swimming')
								 <td class="warning">
									<div id="prodiv" class="progress progress-striped active">
										<div id="pro" class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
										审核中</div>
									</div>
								 </td>
								 @else
								 <td class="success">{{ '通过' }}</td>
								 @endif
							 @elseif($app->enable==2)
							 <td class="success">{{ '通过' }}</td>
							 @else
							  <td class="danger">{{ '失败' }}</td>
							 @endif
						  </tr>
						 @endforeach
						</tbody>
					</table>
				</div>
				<div class="col-md-1 column">
				</div>
			</div>
		</div>
	</div>
</div>


<div class="container">
	
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-12 column">
					<h3>
						{{Auth::user()->name}}的锻炼记录	
					</h3>
					<hr/>
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-2 column">
				</div>
				<div class="col-md-6 column">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th><strong>场地类型</strong></th>
								<th><strong>场地名称</strong></th>
								<th><strong>锻炼时间</strong></th>
							</tr>
						</thead>
						<tbody>
						  @foreach ($orders as $order)
						  <tr>
							 <td>
							 @if($order->type=='badminton')
							 {{ '羽毛球' }}
							 @elseif($order->type=='pingpang')
							 {{ '乒乓球' }}
							 @elseif($order->type=='tennis')
							 {{ '网球' }}
							 @elseif($order->type=='basketball')
							 {{ '篮球' }}
							 @else
							 {{ '其他' }}
							 @endif
							 </td>
						     <td>{{ $order->gymname }}</td>
						     <td>{{ $order->bookingtime }}</td>
						  </tr>
						 @endforeach
						</tbody>
					</table>
				</div>
				<div class="col-md-4 column">
					<blockquote>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.
						</p> <small>Someone famous <cite>Source Title</cite></small>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
</div>

	

@endsection