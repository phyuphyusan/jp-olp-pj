@extends('frontendtemplate')
@section('title','Home Page')
@section('content')
<section class="categories-section spad">
    <div class="container">
      <div class="section-title">
        <h2>Our Course Categories</h2>
      </div>
      <div class="row">
      <!-- categorie -->
      @foreach($courses as $course)
      <a href="{{route('courseviewpage',$course->id)}}" class="text-dark">
        <div class="col-lg-4 col-md-6">
          <div class="categorie-item shadow">
            <div class="ci-thumb set-bg" data-setbg="{{ asset($course->photo)}}"></div>
            <div class="ci-text">
              <h6>{{$course->name}} </h6>
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
    </div>
  </section>
  <!-- categories section end -->
  @endsection