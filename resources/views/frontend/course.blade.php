@extends('frontendtemplate')
@section('title','Course Page')
@section('content')
<!-- course section -->
<section class="course-section spad pb-0">
	<div class="course-warp">
		<ul class="course-filter controls">
			<li class="control active" data-filter="all">All</li>
			<li class="control" data-filter=".finance">Finance</li>
			<li class="control" data-filter=".design">Design</li>
			<li class="control" data-filter=".web">Web Development</li>
			<li class="control" data-filter=".photo">Photography</li>
		</ul> 
		
		<div class="row">
			<!-- categorie -->
			@foreach($courses as $course)
			<a href="{{route('courseviewpage',$course->id)}}" class="text-dark">
				<div class="col-lg-4 col-md-6">
					<div class="categorie-item shadow">
						<div class="ci-thumb set-bg" data-setbg="{{ asset($course->photo)}}"></div>
						<div class="ci-text">
							<h6>{{$course->name}}	</h6>
							<p>{{$course->week}} Weeks Course</p>
							<span>{{$course->fee}}</span>
							<a href="{{route('courseviewpage',$course->id)}}"></a>		
						</div>
					</div>
				</div>
			</a>
			<!-- {{route('courseviewpage',$course->id)}} -->
			@endforeach
		</div>
		<div class="featured-courses">
			<div class="featured-course course-item">
				<div class="course-thumb set-bg" data-setbg="{{ asset($course->photo)}}">
					<div class="price">Price: $15</div>
				</div>
				<div class="row">
					<div class="col-lg-6 offset-lg-6 pl-0">
						<div class="course-info">
							<div class="course-text">
								<div class="fet-note">Featured Course</div>
								<h5>HTNL5 & CSS For Begginers</h5>
								<p>Lorem ipsum dolor sit amet, consectetur. Phasellus sollicitudin et nunc eu efficitur. Sed ligula nulla, molestie quis ligula in, eleifend rhoncus ipsum. Donec ultrices, sem vel efficitur molestie, massa nisl posuere ipsum, ut vulputate mauris ligula a metus. Aenean vel congue diam, sed bibendum ipsum. Nunc vulputate aliquet tristique. Integer et pellentesque urna</p>
								<div class="students">120 Students</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="{{ asset($course->photo)}}"></div>
								<p>William Parker, <span>Developer</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="featured-course course-item">
				<div class="course-thumb set-bg" data-setbg="{{ asset($course->photo)}}">
					<div class="price">Price: $15</div>
				</div>
				<div class="row">
					<div class="col-lg-6 pr-0">
						<div class="course-info">
							<div class="course-text">
								<div class="fet-note">Featured Course</div>
								<h5>HTNL5 & CSS For Begginers</h5>
								<p>Lorem ipsum dolor sit amet, consectetur. Phasellus sollicitudin et nunc eu efficitur. Sed ligula nulla, molestie quis ligula in, eleifend rhoncus ipsum. Donec ultrices, sem vel efficitur molestie, massa nisl posuere ipsum, ut vulputate mauris ligula a metus. Aenean vel congue diam, sed bibendum ipsum. Nunc vulputate aliquet tristique. Integer et pellentesque urna</p>
								<div class="students">120 Students</div>
							</div>
							<div class="course-author">
								<div class="ca-pic set-bg" data-setbg="{{ asset($course->photo)}}"></div>
								<p>William Parker, <span>Developer</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- course section end -->
@endsection