@extends('frontendtemplate')
@section('title','Courseview Page')
@section('content')
	<div class="container my-5">
		<div class="row">
            <div class="col-md-6 pl-5 mt-3">
             	<img src="{{ asset($course->photo)}}" class="card-img-top img-fluid d-block w-100">
            </div>
            <div class='col-md-6'>
            	<div class='card-body text-left'>
                	<h3 class='card-text font-weight-bold'>{{$course->name}}
                	</h3>
                	<p class="mt-3">{{$course->description}}</p>
              		<h5 class="mt-3">{{$course->lecturer->user->name}},{{$course->lecturer->position}} | {{$course->lecturer->university->name}} , {{$course->lecturer->university->location}}</h5>
              		<h5 class="mt-3 text-info">{{$course->fee}}  MMK | 233 students</h5>
                	<a href="{{route('courseviewpage',$course->id)}}" class="btn btn-outline-info entroll mt-3" >Enroll Now</a>
            	</div>
            </div>
        </div>
        <div class="m-5">
          <h5 class="mb-3 font-weight-bold">Requirements</h5>
          <ul>
            <li>Have a computer with Internet</li>
            <li>Have a computer with Internet</li>
            <li>Prepare to build real web apps!</li>
            <li>Brace yourself for stupid jokes about my dog Rusty</li>
          </ul>
        </div>
  </div>
 
<!-- course section end -->
@endsection