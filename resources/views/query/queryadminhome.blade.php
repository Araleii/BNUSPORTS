@extends('appgym')

@section('content')


          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif


<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="tabbable" id="tabs-599807">
				<ul class="nav nav-tabs">
					<li id="tab001">
						 <a href="#panel-344603" data-toggle="tab">羽毛球</a>
					</li>
					<li id="tab002">
						 <a href="#panel-108889" data-toggle="tab">乒乓球</a>
					</li>
					<li id="tab003">
						 <a href="#panel-100001" data-toggle="tab">网球</a>
					</li>
					<li id="tab004">
						 <a href="#panel-100002" data-toggle="tab">篮球</a>
					</li>
					<li id="tab005">
						 <a href="#panel-100003" data-toggle="tab">足球</a>
					</li>
					<li id="tab006">
						 <a href="#panel-100004" data-toggle="tab">游泳</a>
					</li>
				</ul>
					
				<div class="tab-content">
<!--羽毛球选项卡开始-->
					<div class="tab-pane" id="panel-344603">
						<p>
							<div class="row clearfix">
								<div class="col-md-4 column">
								</div>
								<div class="col-md-4 column">
								</div>
								<div class="col-md-4 column">
									<a href="{{ URL('query/gymadmin/badminton/create') }}" class="btn btn-large btn-success pull-right">+场馆</a>
								</div>
							</div>
		<!--	羽毛球日期导航部分开始-->
							<ul class="nav nav-pills">
							@for ($i = 0; $i < $totalday; $i++)
							    @if($offset==$i)
								<li class="active"><a style="cursor:pointer;" href="{{ URL('query/badminton/'.$i.'/0/1') }}">{{ $days[$i] }}</a></li>
								@else
								<li><a style="cursor:pointer;" href="{{ URL('query/adminhome/badminton/'.$i.'/0/1') }}">{{ $days[$i] }}</a></li>
								@endif
							@endfor
							</ul>
							<hr/>
		<!--	羽毛球日期导航部分结束-->
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
						</p>
					</div>
<!--羽毛球选项卡结束-->
<!--乒乓球选项卡开始-->
					<div class="tab-pane" id="panel-108889">
						<hr/>
						<p>
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th colspan="1" rowspan="2">
											<strong>场馆名</strong>
										</th>
										<th colspan="3" rowspan="1">
											<strong>{{ $days[0] }}</strong>
										</th>
									</tr>
									<tr>
										<th>
											<strong>6点到7点</strong>
										</th>
										<th>
											<strong>7点到8点</strong>
										</th>
										<th>
											<strong>8点到9点</strong>
										</th>
									</tr>
								</thead>
								<tbody>
								    @foreach ($pingpangs as $pingpang)
							      <tr>
							         <td>{{ $pingpang->name }}</td>
									 
									   @if ($pingpang->six2seven==0)
									   <td class="success">
									    <form action="{{  URL('query/gymadmin/pingpang/'.$pingpang->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											  <input type="hidden" name="changetype" value="lock">
											  <input type="hidden" name="time" value="six2seven">
											 <button type="submit" class="btn btn-warning">锁定</button>
				          				 </form>
									  </td>
				                		@elseif($pingpang->six2seven==2)
									  <td class="danger">
										<a href="#" class="btn btn-default disabled" role="button">已订</a>
									  </td>
										@else
									  <td class="warning">
										 <form action="{{ URL('query/gymadmin/pingpang/'.$pingpang->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					 						 <input type="hidden" name="changetype" value="unlock">
											 <input type="hidden" name="time" value="six2seven">
											 <button type="submit" class="btn btn-info">解锁</button>
				          				 </form>  
									  </td>
				              			@endif
										@if ($pingpang->seven2eight==0)
									   <td class="success">
									    <form action="{{  URL('query/gymadmin/pingpang/'.$pingpang->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											  <input type="hidden" name="changetype" value="lock">
											  <input type="hidden" name="time" value="seven2eight">
											 <button type="submit" class="btn btn-warning">锁定</button>
				          				 </form>
									  </td>
										@elseif($pingpang->seven2eight==2)
									  <td class="danger">
										<a href="#" class="btn btn-default disabled" role="button">已订</a>
									  </td>
				                		@else
									  <td class="warning">
										 <form action="{{ URL('query/gymadmin/pingpang/'.$pingpang->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					 						 <input type="hidden" name="changetype" value="unlock">
											 <input type="hidden" name="time" value="seven2eight">
											 <button type="submit" class="btn btn-info">解锁</button>
				          				 </form>  
									  </td>
				              			@endif
										@if ($pingpang->eight2nine==0)
									   <td class="success">
									    <form action="{{  URL('query/gymadmin/pingpang/'.$pingpang->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											  <input type="hidden" name="changetype" value="lock">
											  <input type="hidden" name="time" value="eight2nine">
											 <button type="submit" class="btn btn-warning">锁定</button>
				          				 </form>
									  </td>
									  @elseif($pingpang->eight2nine==2)
									 <td class="danger">
										<a href="#" class="btn btn-default disabled" role="button">已订</a>
									  </td>
				                	  @else
									  <td class="warning">
										 <form action="{{ URL('query/gymadmin/pingpang/'.$pingpang->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					 						 <input type="hidden" name="changetype" value="unlock">
											 <input type="hidden" name="time" value="eight2nine">
											 <button type="submit" class="btn btn-info">解锁</button>
				          				 </form>  
									  </td>
				              			@endif
									  
							      </tr>
							  @endforeach
								</tbody>
							</table>
						</p>
					</div>
<!--乒乓球选项卡结束-->
<!--网球选项卡开始-->
					<div class="tab-pane" id="panel-100001">
						<p>
							<div class="row clearfix">
								<div class="col-md-4 column">
								</div>
								<div class="col-md-4 column">
								</div>
								<div class="col-md-4 column">
									<a href="{{ URL('query/gymadmin/tennis/create') }}" class="btn btn-large btn-success pull-right">+场馆</a>
								</div>
							</div>
		<!--	网球日期导航部分开始-->
							<ul class="nav nav-pills">
							@for ($i = 0; $i < $totaldaytennis; $i++)
							    @if($offsettennis==$i)
								<li class="active"><a style="cursor:pointer;" href="{{ URL('query/adminhome/badminton/0/'.$i.'/3') }}">{{ $daystennis[$i] }}</a></li>
								@else
								<li><a style="cursor:pointer;" href="{{ URL('query/adminhome/badminton/0/'.$i.'/3') }}">{{ $daystennis[$i] }}</a></li>
								@endif
							@endfor
							</ul>
							<hr/>
		<!--	网球日期导航部分结束-->
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th colspan="1" rowspan="2">
											<strong>场馆名</strong>
										</th>
										<th colspan="3" rowspan="1">
											<strong>{{ $daystennis[$offsettennis] }}</strong>
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
								    @foreach ($tennises as $tennis)
							      <tr>
							         <td>{{ $tennis->name }}</td>
									 
									   @if ($tennis->six2seven==0)
									   <td class="success">
									    <form action="{{  URL('query/gymadmin/tennis/'.$tennis->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											  <input type="hidden" name="changetype" value="lock">
											  <input type="hidden" name="time" value="six2seven">
											 <button type="submit" class="btn btn-warning">锁定</button>
				          				 </form>
									  </td>
				                		@elseif($tennis->six2seven==2)
									  <td class="danger">
										<a href="#" class="btn btn-default disabled" role="button">已订</a>
									  </td>
										@else
									  <td class="warning">
										 <form action="{{ URL('query/gymadmin/tennis/'.$tennis->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					 						 <input type="hidden" name="changetype" value="unlock">
											 <input type="hidden" name="time" value="six2seven">
											 <button type="submit" class="btn btn-info">解锁</button>
				          				 </form>  
									  </td>
				              			@endif
										@if ($tennis->seven2eight==0)
									   <td class="success">
									    <form action="{{  URL('query/gymadmin/tennis/'.$tennis->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											  <input type="hidden" name="changetype" value="lock">
											  <input type="hidden" name="time" value="seven2eight">
											 <button type="submit" class="btn btn-warning">锁定</button>
				          				 </form>
									  </td>
										@elseif($tennis->seven2eight==2)
									  <td class="danger">
										<a href="#" class="btn btn-default disabled" role="button">已订</a>
									  </td>
				                		@else
									  <td class="warning">
										 <form action="{{ URL('query/gymadmin/tennis/'.$tennis->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					 						 <input type="hidden" name="changetype" value="unlock">
											 <input type="hidden" name="time" value="seven2eight">
											 <button type="submit" class="btn btn-info">解锁</button>
				          				 </form>  
									  </td>
				              			@endif
										@if ($tennis->eight2nine==0)
									   <td class="success">
									    <form action="{{  URL('query/gymadmin/tennis/'.$tennis->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											  <input type="hidden" name="changetype" value="lock">
											  <input type="hidden" name="time" value="eight2nine">
											 <button type="submit" class="btn btn-warning">锁定</button>
				          				 </form>
									  </td>
									  @elseif($tennis->eight2nine==2)
									 <td class="danger">
										<a href="#" class="btn btn-default disabled" role="button">已订</a>
									  </td>
				                	  @else
									  <td class="warning">
										 <form action="{{ URL('query/gymadmin/tennis/'.$tennis->id) }}" method="POST" style="display: inline;">
				             				 <input name="_method" type="hidden" value="PUT">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					 						 <input type="hidden" name="changetype" value="unlock">
											 <input type="hidden" name="time" value="eight2nine">
											 <button type="submit" class="btn btn-info">解锁</button>
				          				 </form>  
									  </td>
				              			@endif
									  
							      </tr>
							  @endforeach
								</tbody>
							</table>
						</p>
					</div>
<!--网球选项卡结束-->
<!--篮球选项卡开始-->
					<div class="tab-pane" id="panel-100002">
						<hr/>
						<p>
							<div class="container">
								<div class="row clearfix">
									<div class="col-md-12 column">
										<h3>
											所有篮球订单
										</h3>
										<hr/>
										<div class="row clearfix">
											<div class="col-md-1 column">
											</div>
											<div class="col-md-10 column">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>
																申请号
															</th>
															<th>
																申请人学号
															</th>
															<th>
																电话
															</th>
															<th>
																邮箱
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
																申请描述
															</th>
															<th>
																申请状态
															</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($basketballs as $basketball)
													  <tr>
														 <td>
															 {{ $basketball->id }}
														 </td>
														 <td>
															 {{ $basketball->studentid }}
														 </td>
														  <td>
															 {{ $basketball->phone }}
														 </td>
														  <td>
															 {{ $basketball->email }}
														 </td>
														  <td>
														 @if($basketball->type=='basketball')
														 {{ '篮球场' }}
														 @else
														 {{ '足球场' }}
														 @endif
														 </td>
														 <td>
															 {{ $basketball->date }}
														 </td>
														 <td>
															 {{ $basketball->begintime }}点到{{ $basketball->endtime }}点
														 </td>
														 <td>
															 {{ $basketball->notes }}
														 </td>
														 @if($basketball->enable==1)
														 <td class="warning" tyle="display: inline;">
															 <form action="{{  URL('query/gymadmin/app/'.$basketball->id) }}" method="GET" style="display: inline;">
									             				 <input name="_method" type="hidden" value="PUT">
									             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
																  <input type="hidden" name="result" value="yes">
																 <button type="submit" class="btn btn-success">通过</button>
									          				 </form>
															 <form action="{{  URL('query/gymadmin/app/'.$basketball->id) }}" method="GET" style="display: inline;">
									             				 <input name="_method" type="hidden" value="PUT">
									             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
																  <input type="hidden" name="result" value="no">
																 <button type="submit" class="btn btn-danger">拒绝</button>
									          				 </form>
															 </td>
														 @elseif($basketball->enable==2)
														 <td class="success">{{ '已通过' }}</td>
														 @else
														  <td class="danger">{{ '未通过' }}</td>
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
						</p>
					</div>
<!--篮球选项卡结束-->
<!--足球选项卡开始-->
					<div class="tab-pane" id="panel-100003">
						<hr/>
						<p>
							<div class="container">
								<div class="row clearfix">
									<div class="col-md-12 column">
										<h3>
											所有足球订单
										</h3>
										<hr/>
										<div class="row clearfix">
											<div class="col-md-1 column">
											</div>
											<div class="col-md-10 column">
												<table class="table table-hover">
													<thead>
														<tr>
															<th>
																申请号
															</th>
															<th>
																申请人学号
															</th>
															<th>
																电话
															</th>
															<th>
																邮箱
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
																申请描述
															</th>
															<th>
																申请状态
															</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($footballs as $football)
													  <tr>
														 <td>
															 {{ $football->id }}
														 </td>
														 <td>
															 {{ $football->studentid }}
														 </td>
														  <td>
															 {{ $football->phone }}
														 </td>
														  <td>
															 {{ $football->email }}
														 </td>
														  <td>
														 @if($football->type=='football')
														 {{ '篮球场' }}
														 @else
														 {{ '足球场' }}
														 @endif
														 </td>
														 <td>
															 {{ $football->date }}
														 </td>
														 <td>
															 {{ $football->begintime }}点到{{ $football->endtime }}点
														 </td>
														 <td>
															 {{ $football->notes }}
														 </td>
														 @if($football->enable==1)
														 <td class="warning" tyle="display: inline;">
															 <form action="{{  URL('query/gymadmin/app/'.$football->id) }}" method="GET" style="display: inline;">
									             				 <input name="_method" type="hidden" value="PUT">
									             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
																  <input type="hidden" name="result" value="yes">
																 <button type="submit" class="btn btn-success">通过</button>
									          				 </form>
															 <form action="{{  URL('query/gymadmin/app/'.$football->id) }}" method="GET" style="display: inline;">
									             				 <input name="_method" type="hidden" value="PUT">
									             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
																  <input type="hidden" name="result" value="no">
																 <button type="submit" class="btn btn-danger">拒绝</button>
									          				 </form>
															 </td>
														 @elseif($football->enable==2)
														 <td class="success">{{ '已通过' }}</td>
														 @else
														  <td class="danger">{{ '未通过' }}</td>
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
						</p>
					</div>
<!--足球选项卡结束-->
<!--游泳选项卡开始-->
					<div class="tab-pane" id="panel-100004">
						<hr/>
						<p>
							<div class="container">
								<div class="row clearfix">
									<div class="col-md-12 column">
										<h3>
											游泳订单
										</h3>
										<hr/>
											<div class="row clearfix">
											<div class="col-md-1 column">
											</div>
											<div class="col-md-10 column">
												<table class="table table-striped table-hover">
													<thead>
														<tr>
															<th>
																订单号
															</th>
															<th>
																学号
															</th>
															<th>
																日期
															</th>
														</tr>
													</thead>
													<tbody>
														@foreach ($swimmings as $swimming)
													  <tr>
														  <td>
															 {{ $swimming->id }}
														 </td>
														 <td>
															 {{ $swimming->studentid }}
														 </td>
														 <td>
															 {{ $swimming->date }}
														 </td>
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
						</p>
					</div>
<!--游泳选项卡结束-->
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript">
		if({{ $showtype}}==1 ){
			document.getElementById("tab001").className = "active";
			document.getElementById("panel-344603").className = "tab-pane active";
		}else if( {{ $showtype}}==2 ){
			document.getElementById("tab002").className = "active";
			document.getElementById("panel-108889").className = "tab-pane active";
		}else if( {{ $showtype}}==3 ){
			document.getElementById("tab003").className = "active";
			document.getElementById("panel-100001").className = "tab-pane active";
		}else if( {{ $showtype}}==4 ){
			document.getElementById("tab004").className = "active";
			document.getElementById("panel-100002").className = "tab-pane active";
		}else if( {{ $showtype}}==5 ){
			document.getElementById("tab005").className = "active";
			document.getElementById("panel-100003").className = "tab-pane active";
		}else{
			document.getElementById("tab006").className = "active";
			document.getElementById("panel-100004").className = "tab-pane active";
		}
	</script>
	
</div>
@endsection