@extends('appquery')

@section('content')
	<!--{{ $offset }}-->

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
		<!--	羽毛球日期导航部分开始-->
							<ul class="nav nav-pills">
							@for ($i = 0; $i < $totalday; $i++)
							    @if($offset==$i)
								<li class="active"><a style="cursor:pointer;" href="{{ URL('query/badminton/'.$i.'/0/1') }}">{{ $days[$i] }}</a></li>
								@else
								<li><a style="cursor:pointer;" href="{{ URL('query/badminton/'.$i.'/0/1') }}">{{ $days[$i] }}</a></li>
								@endif
							@endfor
							<img style="float:right;	"width="7%" alt="140x140" src="../../../../img/badminton.jpg" class="img-rounded" />
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
											<strong>{{ $days[$offset] }}</strong>
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
									    <form action="{{ URL('booking/badminton/'.$badmintonstate->date.'/morning/'.$badmintonstate->name.'/'.$badmintonstate->id) }}" method="GET" style="display: inline;">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <button type="submit" class="btn btn-primary">预定</button>
				          				 </form>
				                		@else
				                 		<a href="#" class="btn btn-default disabled" role="button">已订</a>
				              			@endif
									  </td>
									  <td>
									   @if ($badmintonstate->afternoon==0)
									    <form action="{{ URL('booking/badminton/'.$badmintonstate->date.'/afternoon/'.$badmintonstate->name.'/'.$badmintonstate->id) }}" method="GET" style="display: inline;">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <button type="submit" class="btn btn-primary">预定</button>
				          				 </form>
				                		@else
				                 		<a href="#" class="btn btn-default disabled" role="button">已订</a>
				              			@endif
									  </td>
									 <td>
									   @if ($badmintonstate->evening==0)
									    <form action="{{ URL('booking/badminton/'.$badmintonstate->date.'/evening/'.$badmintonstate->name.'/'.$badmintonstate->id) }}" method="GET" style="display: inline;">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <button type="submit" class="btn btn-primary">预定</button>
				          				 </form>
				                		@else
				                 		<a href="#" class="btn btn-default disabled" role="button">已订</a>
				              			@endif
									  </td>
							      </tr>
							  @endforeach
								</tbody>
							</table>
						</p>
					</div>
<!--羽毛球选项卡结束-->
<!--乒乓球选项卡开始-->
					<div class="tab-pane" id="panel-108889">
					<img style="float:right;" width="7%" alt="140x140" src="../../../../img/pingpong.jpg" class="img-rounded" />
					
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
									 <td>
									   @if ($pingpang->six2seven==0)
									    <form action="{{ URL('booking/pingpang/'.$pingpang->date.'/six2seven/'.$pingpang->name.'/'.$pingpang->id) }}" method="GET" style="display: inline;">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <button type="submit" class="btn btn-primary">预定</button>
				          				 </form>
				                		@else
				                 		<a href="#" class="btn btn-default disabled" role="button">已订</a>
				              			@endif
									  </td>
									  <td>
									   @if ($pingpang->seven2eight==0)
									    <form action="{{ URL('booking/pingpang/'.$pingpang->date.'/seven2eight/'.$pingpang->name.'/'.$pingpang->id) }}" method="GET" style="display: inline;">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <button type="submit" class="btn btn-primary">预定</button>
				          				 </form>
				                		@else
				                 		<a href="#" class="btn btn-default disabled" role="button">已订</a>
				              			@endif
									  </td>
									 <td>
									   @if ($pingpang->eight2nine==0)
									    <form action="{{ URL('booking/pingpang/'.$pingpang->date.'/eight2nine/'.$pingpang->name.'/'.$pingpang->id) }}" method="GET" style="display: inline;">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <button type="submit" class="btn btn-primary">预定</button>
				          				 </form>
				                		@else
				                 		<a href="#" class="btn btn-default disabled" role="button">已订</a>
				              			@endif
									  </td>
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
		<!--	网球日期导航部分开始-->
							<ul class="nav nav-pills">
							@for ($i = 0; $i < $totaldaytennis; $i++)
							    @if($offsettennis==$i)
								<li class="active"><a style="cursor:pointer;" href="{{ URL('query/badminton/0/'.$i.'/3') }}">{{ $daystennis[$i] }}</a></li>
								@else
								<li><a style="cursor:pointer;" href="{{ URL('query/badminton/0/'.$i.'/3') }}">{{ $daystennis[$i] }}</a></li>
								@endif
							@endfor
							<img style="float:right;" width="7%" alt="140x140" src="../../../../img/tennis.jpg" class="img-rounded" />
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
									 <td>
									   @if ($tennis->six2seven==0)
									    <form action="{{ URL('booking/tennis/'.$tennis->date.'/six2seven/'.$tennis->name.'/'.$tennis->id) }}" method="GET" style="display: inline;">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <button type="submit" class="btn btn-primary">预定</button>
				          				 </form>
				                		@else
				                 		<a href="#" class="btn btn-default disabled" role="button">已订</a>
				              			@endif
									  </td>
									  <td>
									   @if ($tennis->seven2eight==0)
									    <form action="{{ URL('booking/tennis/'.$tennis->date.'/seven2eight/'.$tennis->name.'/'.$tennis->id) }}" method="GET" style="display: inline;">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <button type="submit" class="btn btn-primary">预定</button>
				          				 </form>
				                		@else
				                 		<a href="#" class="btn btn-default disabled" role="button">已订</a>
				              			@endif
									  </td>
									 <td>
									   @if ($tennis->eight2nine==0)
									    <form action="{{ URL('booking/tennis/'.$tennis->date.'/eight2nine/'.$tennis->name.'/'.$tennis->id) }}" method="GET" style="display: inline;">
				             				 <input type="hidden" name="_token" value="{{ csrf_token() }}">
											 <button type="submit" class="btn btn-primary">预定</button>
				          				 </form>
				                		@else
				                 		<a href="#" class="btn btn-default disabled" role="button">已订</a>
				              			@endif
									  </td>
							      </tr>
							  @endforeach
								</tbody>
							</table>
						</p>
					</div>
<!--网球选项卡结束-->
<!--篮球选项卡开始-->
					<div class="tab-pane" id="panel-100002">
					<img style="float:right;" width="7%" alt="140x140" src="../../../../img/basketball.jpg" class="img-rounded" />
						<p>
							<div class="container">
								<div class="row clearfix">
									<div class="col-md-12 column">
										<div class="row clearfix">
											<div class="col-md-4 column">
											</div>
											<div class="col-md-4 column">
												<form class="form-horizontal" role="form" action="{{ URL('application/basketball') }}" method="GET">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="studentid" value="{{ Auth::user()->studentid }}">
													<input type="hidden" name="email" value="{{ Auth::user()->email }}">
													<input type="hidden" name="type" value="basketball">
													<legend>{{Auth::user()->name}}同学,请输入您篮球场的预定信息</legend>  
													
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-3 control-label">联系方式</label>
														<div class="col-sm-9">
															<input required="required" class="form-control" id="inputEmail3" placeholder="您的联系电话,方便我们告知您结果" name="phone"/>
														</div>
													</div>
													<div class="form-group">
														 <label for="inputPassword3" class="col-sm-3 control-label">预定日期</label>
														<div class="col-sm-9">
															<input required="required" type="date" class="form-control" id="inputPassword3" placeholder="格式:yyyy-mm-dd" name="date"/>
														</div>
													</div>
													<div class="form-group">
														<label for="i3" class="col-sm-3 control-label">开始时间</label>
														<div class="col-sm-9">
															<select class="form-control" name="begintime" id="i3">
															 <option value ="7">7点</option>
															 <option value ="8">8点</option>
															 <option value ="9">9点</option>
															 <option value ="10">10点</option>
															 <option value ="11">11点</option>
															 <option value ="12">12点</option>
															 <option value ="13">13点</option>
															 <option value ="14">14点</option>
															 <option value ="15">15点</option>
															 <option value ="16">16点</option>
															 <option value ="17">17点</option>
															 <option value ="18">18点</option>
															 <option value ="19">19点</option>
															 <option value ="20">20点</option>
															 <option value ="21">21点</option>
															 <option value ="22">22点</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label for="i5" class="col-sm-3 control-label">结束时间</label>
														<div class="col-sm-9">
															<select class="form-control" name="endtime" id="i5">
															 <option value ="7">7点</option>
															 <option value ="8">8点</option>
															 <option value ="9">9点</option>
															 <option value ="10">10点</option>
															 <option value ="11">11点</option>
															 <option value ="12">12点</option>
															 <option value ="13">13点</option>
															 <option value ="14">14点</option>
															 <option value ="15">15点</option>
															 <option value ="16">16点</option>
															 <option value ="17">17点</option>
															 <option value ="18">18点</option>
															 <option value ="19">19点</option>
															 <option value ="20">20点</option>
															 <option value ="21">21点</option>
															 <option value ="22">22点</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														 <label for="i6" class="col-sm-3 control-label">备注</label>
														 <div class="col-sm-9">
															<textarea id="i6" name="notes" rows="10" class="form-control" required="required" placeholder="请输入您的额外需求"> </textarea>
														 </div>
													</div>
													<hr/>
							                       <div class="form-group">
														<div class="col-sm-offset-3 col-sm-6">
															 <button type="submit" class="btn btn-success btn-lg btn-block">提交申请</button>
														</div>
													</div>
												</form>
											</div>
											<div class="col-md-4 column">
											</div>
										</div>
										<div class="alert alert-success alert-dismissable">
											 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4>
												注意事项
											</h4> <strong>请注意，</strong> 请将场馆用途具体描述清晰，以方便我们进行审核，谢谢。 <a href="#" class="alert-link"></a>
										</div>
									</div>
								</div>
							</div>
						</p>
					</div>
<!--篮球选项卡结束-->
<!--足球选项卡开始-->
					<div class="tab-pane" id="panel-100003">
						<img style="float:right;" width="7%" alt="140x140" src="../../../../img/football.jpg" class="img-rounded" />
						<p>
							<div class="container">
								<div class="row clearfix">
									<div class="col-md-12 column">
										<div class="row clearfix">
											<div class="col-md-4 column">
											</div>
											<div class="col-md-4 column">
												<form class="form-horizontal" role="form" action="{{ URL('application/football') }}" method="GET">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="studentid" value="{{ Auth::user()->studentid }}">
													<input type="hidden" name="email" value="{{ Auth::user()->email }}">
													<input type="hidden" name="type" value="basketball">
													<legend>{{Auth::user()->name}}同学,请输入您足球场的预定信息</legend>  
													
													<div class="form-group">
														<label for="inputEmail3" class="col-sm-3 control-label">联系方式</label>
														<div class="col-sm-9">
															<input required="required" class="form-control" id="inputEmail3" placeholder="您的联系电话,方便我们告知您结果" name="phone"/>
														</div>
													</div>
													<div class="form-group">
														 <label for="inputPassword3" class="col-sm-3 control-label">预定日期</label>
														<div class="col-sm-9">
															<input required="required" type="date" class="form-control" id="inputPassword3" placeholder="格式:yyyy-mm-dd" name="date"/>
														</div>
													</div>
													<div class="form-group">
														<label for="i3" class="col-sm-3 control-label">开始时间</label>
														<div class="col-sm-9">
															<select class="form-control" name="begintime" id="i3">
															 <option value ="7">7点</option>
															 <option value ="8">8点</option>
															 <option value ="9">9点</option>
															 <option value ="10">10点</option>
															 <option value ="11">11点</option>
															 <option value ="12">12点</option>
															 <option value ="13">13点</option>
															 <option value ="14">14点</option>
															 <option value ="15">15点</option>
															 <option value ="16">16点</option>
															 <option value ="17">17点</option>
															 <option value ="18">18点</option>
															 <option value ="19">19点</option>
															 <option value ="20">20点</option>
															 <option value ="21">21点</option>
															 <option value ="22">22点</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label for="i5" class="col-sm-3 control-label">结束时间</label>
														<div class="col-sm-9">
															<select class="form-control" name="endtime" id="i5">
															 <option value ="7">7点</option>
															 <option value ="8">8点</option>
															 <option value ="9">9点</option>
															 <option value ="10">10点</option>
															 <option value ="11">11点</option>
															 <option value ="12">12点</option>
															 <option value ="13">13点</option>
															 <option value ="14">14点</option>
															 <option value ="15">15点</option>
															 <option value ="16">16点</option>
															 <option value ="17">17点</option>
															 <option value ="18">18点</option>
															 <option value ="19">19点</option>
															 <option value ="20">20点</option>
															 <option value ="21">21点</option>
															 <option value ="22">22点</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														 <label for="i6" class="col-sm-3 control-label">备注</label>
														 <div class="col-sm-9">
															<textarea id="i6" name="notes" rows="10" class="form-control" required="required" placeholder="请输入您的额外需求"> </textarea>
														 </div>
													</div>
													<hr/>
							                       <div class="form-group">
														<div class="col-sm-offset-3 col-sm-6">
															 <button type="submit" class="btn btn-success btn-lg btn-block">提交申请</button>
														</div>
													</div>
												</form>
											</div>
											<div class="col-md-4 column">
											</div>
										</div>
										<div class="alert alert-success alert-dismissable">
											 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4>
												注意事项
											</h4> <strong>请注意，</strong> 请将场馆用途具体描述清晰，以方便我们进行审核，谢谢。 <a href="#" class="alert-link"></a>
										</div>
									</div>
								</div>
							</div>
						</p>
					</div>
<!--足球选项卡开始-->
<!--游泳选项卡开始-->
					<div class="tab-pane" id="panel-100004">
						<hr/>	
						<p>
							<div class="container">
								<div class="row clearfix">
									<div class="col-md-12 column">
										<div class="row clearfix">
											<div class="col-md-4 column">
											</div>
											<div class="col-md-4 column" style="text-align:center;">
												<form class="form-horizontal" role="form" action="{{ URL('application/swimming') }}" method="GET">
													<input type="hidden" name="_token" value="{{ csrf_token() }}">
													<input type="hidden" name="studentid" value="{{ Auth::user()->studentid }}">
													<input type="hidden" name="email" value="{{ Auth::user()->email }}">
													<input type="hidden" name="type" value="basketball">
													<input type="hidden" name="phone" value="18811478025">
													<input type="hidden" name="notes" value="...">
													<input type="hidden" name="begintime" value="7">
													<input type="hidden" name="endtime" value="9">
													<legend>{{Auth::user()->name}}同学,你要定今日的游泳票吗？</legend>  
													<hr/>
													<img alt="140x140" width="370" src="../../../../img/swm.jpg" />
							                        <hr/>
													<div class="form-group">
														<div class="col-sm-offset-3 col-sm-6">
															 <button type="submit" class="btn btn-success btn-lg btn-block">我要预订</button>
														</div>
													</div>
												</form>
											</div>
											<div class="col-md-4 column">
											</div>
										</div>
										<div class="alert alert-success alert-dismissable">
											 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<h4>
												注意事项
											</h4> <strong>请注意，</strong> 成功预订之后，携带学生卡便可以直接进入邱季端游泳馆，请记得带好自己的学生卡。 <a href="#" class="alert-link"></a>
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