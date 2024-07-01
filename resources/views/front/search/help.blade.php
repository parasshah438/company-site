@if(count($help))
@foreach($help as $val)
<div class="col-lg-4 col-md-6 col-12">
	<div class="single-help-box">
		<a href="#">
			<h4>{{$val->title}}</h4>
			{!!$val->description!!}
		</a>
	</div> <!-- /.single-help-box -->
</div> <!-- /.col- -->
@endforeach
@else
<div class="col-md-12">
	<div class="single-help-box">
		<a href="javascript:void(0);">
		<h4>No Records Found</h4>
	</a>
	</div>
</div>		
@endif
		