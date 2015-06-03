@extends('app')

@section('content')
<div id="content">
	
		<table class="table table-bordered" style=" text-align:center;">
		   <caption>羽毛球</caption>
		   <thead>
		      <tr>
		         <th rowspan=2 style=" text-align:center;vertical-align:middle;" >场馆编号</th>
					<th colspan=3 style=" text-align:center;vertical-align:middle;">日期</th>
					<tr>
						<td>Morning</td>
						<td>Afternoon</td>
						<td>Evening</td>
					</tr>
		      </tr>
		   </thead>
		   <tbody>
			   @foreach ($badmintonstates as $badmintonstate)
			      <tr>
			         <td>{{ $badmintonstate->name }}</td>
					 <td>
					   @if ($badmintonstate->morning==0)
					    <form action="{{ URL('/') }}" method="GET" style="display: inline;">
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
                 		<button type="button" class="btn btn-primary">预定</button>
                		@else
                 		<a href="#" class="btn btn-default btn-lg disabled" role="button">已订</a>
              			@endif
					  </td>
					 <td>
					   @if ($badmintonstate->evening==0)
                 		<button type="button" class="btn btn-primary">预定</button>
                		@else
                 		<a href="#" class="btn btn-default btn-lg disabled" role="button">已订</a>
              			@endif
					  </td>
			      </tr>
			  @endforeach
		   </tbody>
		</table>

	</div>
@endsection