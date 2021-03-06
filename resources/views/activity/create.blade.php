@extends('appactivityadmin')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">创建新活动</div>

        <div class="panel-body">

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

          <form action="{{ URL('activity/activityadmin') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            活动名称<input type="text" name="title" class="form-control" required="required" value="{{ old('title') }}" style="width:30%" >
            开始时间<input type="text" name="starttime" class="form-control" required="required" value="{{ old('starttime') }}" style="width:30%" >
            结束时间<input type="text" name="endtime" class="form-control" required="required" value="{{ old('endtime') }}" style="width:30%" >
            活动地点<input type="text" name="place" class="form-control" required="required" value="{{ old('place') }}">
            创建者<input type="text" name="organizer" class="form-control" required="required" value="{{ old('organizer') }}">
            联系电话<input type="text" name="tel" class="form-control" required="required" value="{{ old('tel') }}">
            联系邮箱<input type="text" name="email" class="form-control" required="required" value="{{ old('email') }}">
            活动要求<input type="text" name="requirement" class="form-control" required="required" value="{{ old('requirement') }}">
            <br>
            活动描述<textarea name="detail" rows="10" class="form-control" required="required" value="{{ old('detail') }}"></textarea>
            <br>
            <button class="btn btn-lg btn-info">新增活动</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection