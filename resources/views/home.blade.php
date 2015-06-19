@extends('app')

@section('content')
<br/>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-4 column">
				</div>
				<div class="col-md-4 column" style="text-align:center;">
					<img width="80%" alt="140x140" src="img/title.jpg" />
				</div>
				<div class="col-md-4 column">
				</div>
			</div>
		</div>
	</div>
</div>
<br/>
<br/>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row clearfix">
				<div class="col-md-1 column">
				</div>
				<div class="col-md-10 column">
					<div class="row clearfix">
						<div class="col-md-4 column">
							<a href="{{ URL('query/badminton/0/0/1') }}"><img id="yumaoqiu" alt="140x140" src="img/pre_badminton.jpg" class="img-thumbnail" onMouseover="change11()" onMouseOut="change12()" /></a>
						</div>
						<div class="col-md-4 column">
							<a href="{{ URL('query/badminton/0/0/2') }}"><img id="pingpongqiu" alt="140x140" src="img/pre_pingpong.jpg" class="img-thumbnail" onMouseover="change21()" onMouseOut="change22()" /></a>
						</div>
						<div class="col-md-4 column">
							<a href="{{ URL('query/badminton/0/0/3') }}"><img id="wangqiu" alt="140x140" src="img/pre_tennis.jpg" class="img-thumbnail" onMouseover="change31()" onMouseOut="change32()" /></a>
						</div>
					</div>
					<br/>
					<div class="row clearfix">
						<div class="col-md-4 column">
							<a href="{{ URL('query/badminton/0/0/4') }}"><img id="lanqiu" alt="140x140" src="img/pre_basketball.jpg" class="img-thumbnail" onMouseover="change41()" onMouseOut="change42()" /></a>
						</div>
						<div class="col-md-4 column">
							<a href="{{ URL('query/badminton/0/0/5') }}"><img id="zuqiu" alt="140x140" src="img/pre_football.jpg" class="img-thumbnail" onMouseover="change51()" onMouseOut="change52()" /></a>
						</div>
						<div class="col-md-4 column">
							<a href="{{ URL('query/badminton/0/0/6') }}"><img id="youyong" alt="140x140" src="img/pre_swimming.jpg" class="img-thumbnail" onMouseover="change61()" onMouseOut="change62()" /></a>
						</div>
					</div>
				</div>
				<div class="col-md-1 column">
				</div>
			</div>
		</div>
	</div>
</div>

@endsection