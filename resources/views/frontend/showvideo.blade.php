@section('title','CourseDetails')

	<div class="container">
		{{-- <p class="ml-5"> 
			<iframe src="{{url('backendtemplate/storage/'.$coursedetail->video)}}" width="1270" height="600"></iframe>
		</p>	 --}}
		<video id="my-video" class="video-js" controls preload="auto" width="1270" height="600" data-setup="{}">
            <source src="{{url('backendtemplate/storage/'.$coursedetail->video)}}" type='video/mp4' target="_blank">
        </video>
	</div>
 