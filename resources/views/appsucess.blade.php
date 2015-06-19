@extends('app')

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

@if($type!='swimming')
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-4 column">
				</div>
				<div class="col-md-4 column">
					<div id="info" class="alert alert-success alert-dismissable" style="visibility:hidden;">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
						<h4>
							提示信息
						</h4> <strong>好极了!</strong> 您的申请已经成功提交，我们将会在1个工作日内告知您结果,对审核结果有任何问题，请联系@Araleii。 <a href="{{ url('/') }}" class="alert-link">回到主页</a>
					</div>
					<div id="prodiv" class="progress progress-striped active">
						<div id="pro" class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
							<span class="sr-only"></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 column">
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	setProgress();
</script>
@else
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-4 column">
				</div>
				<div class="col-md-4 column">
					<div id="info" class="alert alert-success alert-dismissable" style="visibility:hidden;text-align:center;">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
						<h2>
							预订成功！
						</h2> <br/><strong>记得来游泳哦,不要忘记带上学生卡</strong>  <a href="{{ url('/') }}" class="alert-link"></a>
					</div>
					<div id="prodiv" class="progress progress-striped active">
						<div id="pro" class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
							<span class="sr-only"></span>
						</div>
					</div>
				</div>
				<div class="col-md-4 column">
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	setProgress();
</script>
@endif



@endsection