@extends('appquery')


@section('content')

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-4 column">
				</div>
				<div class="col-md-4 column">
					<h1>
						确认订单<small>{{$name}}</small>
					</h1>
				</div>
				<div class="col-md-4 column">
				</div>
			</div>
			<div class="row clearfix">
				<div class="col-md-4 column">
				</div>
				<div class="col-md-4 column">
					{{ Auth::user()->studentid }}
					<form class="form-inline" action="{{ URL('booking/pay/'.Auth::user()->studentid.'/'.$type.'/'.$name.'/'.$date.'/'.$time.'/'.$id) }}" method="GET">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<fieldset>
							@if ($type=='badminton')
								<legend>
								 {{$date}}  
								    @if ($time=='morning') 
									 上午
								 	@elseif($time=='afternoon') 
									 下午
									@else
									 晚上
								 	@endif
								</legend>
							@elseif($type=='pingpang')
								<legend>
									 {{$date}}  
									    @if ($time=='six2seven') 
										 6点到7点
									 	@elseif($time=='seven2eight') 
										 7点到8点
										@else
										 8点到9点
									 	@endif
								 </legend>
							@elseif($type=='tennis')
								<legend>
									 {{$date}}  
									    @if ($time=='six2seven') 
										 6点到7点
									 	@elseif($time=='seven2eight') 
										 7点到8点
										@else
										 8点到9点
									 	@endif
								 </legend>
							 @endif
							  <label>备注</label><input type="text" /> <span class="help-block">请按时到场,任何问题请联系@Araleii.</span> 
							  <label class="checkbox"><input type="checkbox" /> 同意支付安全许可</label>
							  <button type="submit" class="btn btn-primary">去支付</button>
						</fieldset>
					</form>
				</div>
				<div class="col-md-4 column">
				</div>
			</div>
		</div>
	</div>
</div>

@endsection