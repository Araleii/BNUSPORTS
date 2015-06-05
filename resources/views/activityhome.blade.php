@extends('appactivity')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">活动列表</div>

        <div class="panel-body">

        <!--<a href="{{ URL('activitys/create') }}" class="btn btn-lg btn-primary">新增</a>-->

        @foreach ($activities as $activity)
            <hr>
            <div class="activity">
              <h4>{{ $activity->title }}</h4>
              <h4><p class="text-primary">From</p>{{ $activity->starttime }} <p class="text-primary">To</p>{{ $activity->endtime }}</h4>
              <h4>{{ $activity->place }}</h4>
              <h4>{{ $activity->organizer }}</h4>
              <h4>联系电话：{{ $activity->tel }}</h4>
              <h4>联系邮箱：{{ $activity->email }}</h4>
              <h4>活动要求：{{ $activity->requirement }}</h4>
            
              <div class="content">
                活动描述<textarea name="detail" rows="10" class="form-control" required="required"  readonly>{{   $activity->detail }}</textarea>
                <!--<p>
                  {{ $activity->detail }}
                </p>-->
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </div>
  </div>
</div>
@endsection