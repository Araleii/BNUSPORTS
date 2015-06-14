@extends('appquery')

@section('content')
<div class="container">
	<div class="row">
		<div class="span12">
			<div class="row">
				<div class="span4">
				</div>
				<div class="span4">
					<div class="page-header">
						<h1>
							确认订单<small>{{$name}}</small>
						</h1>
					</div>
				</div>
				<div class="span4">
				</div>
			</div>
			<div class="row">
				<div class="span4">
				</div>
				<div class="span4">
					{{ Auth::user()->studentid }}
					<form class="form-inline" action="{{ URL('booking/pay/'.Auth::user()->studentid.'/'.$type.'/'.$name.'/'.$date.'/'.$time) }}" method="GET">
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
							 @endif
							  <label>备注</label><input type="text" /> <span class="help-block">请按时到场,任何问题请联系@Araleii.</span> 
							  <label class="checkbox"><input type="checkbox" /> 同意支付安全许可</label>
							  <button type="submit" class="btn btn-primary">去支付</button>
						</fieldset>
					</form>
				</div>
				<div class="span4">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection