@extends('appgym')

@section('content')
	
		<form action="{{ URL('query/gymadmin/badminton') }}" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="hidden" name="date" value="{{ $newday }}">
		<div class="page-header"  style="display: inline;">
			<h1>
				羽毛球场馆{{ $newday }}
				<button type="submit" class="btn btn-success">提交</button>
			</h1>
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
					<!--bij表示第i个场地和j时间,值为0表示可用，1表示关闭-->
				   @for ($i = 0; $i < 10; $i++)
			      <tr>
			         <td>羽毛球场{{ $i }}</td>
					 <td id = "{{ 'd'.$i.'0'  }}" class="success">
						 <input id = "{{ 'd'.$i.'00'  }}" type="hidden" name="{{ 'd'.$i.'00'  }}" value="0">
						 <button id = "{{ 'd'.$i.'000'  }}" type="button" class="btn btn-warning" onclick="changeState('{{ 'd'.$i.'00'  }}');">关闭</button>
						 <button style="display: none;" id = "{{ 'd'.$i.'001'  }}" type="button" class="btn btn-success" onclick="changeState('{{ 'd'.$i.'00'  }}');">开启</button>
					</td>
					<td id = "{{ 'd'.$i.'1'  }}" class="success">
						 <input id = "{{ 'd'.$i.'10'  }}" type="hidden" name="{{ 'd'.$i.'10'  }}" value="0">
						 <button id = "{{ 'd'.$i.'100'  }}" type="button" class="btn btn-warning" onclick="changeState('{{ 'd'.$i.'10'  }}');">关闭</button>
						 <button style="display: none;" id = "{{ 'd'.$i.'101'  }}" type="button" class="btn btn-success" onclick="changeState('{{ 'd'.$i.'10'  }}');">开启</button>
					</td>
					<td id = "{{ 'd'.$i.'2'  }}" class="success">
						 <input id = "{{ 'd'.$i.'20'  }}" type="hidden" name="{{ 'd'.$i.'20'  }}" value="0">
						 <button id = "{{ 'd'.$i.'200'  }}" type="button" class="btn btn-warning" onclick="changeState('{{ 'd'.$i.'20'  }}');">关闭</button>
						 <button style="display: none;" id = "{{ 'd'.$i.'201'  }}" type="button" class="btn btn-success" onclick="changeState('{{ 'd'.$i.'20'  }}');">开启</button>
					</td>
			      </tr>
				  @endfor
				</tbody>
			</table>
		</form>
@endsection