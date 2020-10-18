@extends('frontendtemplate')
@section('title','Courseview Page')
@section('content')
<div class="container my-4">
  <div class="row">
    <div class="col-md-6 pl-5 mt-3">
      <img src="{{ asset($course->photo)}}" class="card-img-top img-fluid d-block w-100">
    </div>
    <div class='col-md-6'>
      <div class='card-body text-left'>
        <h3 class='card-text font-weight-bold'>{{$course->name}}
        </h3>
        <p class="mt-3">{{$course->description}}</p>
        <h5 class="mt-3">{{$course->lecturer->user->name}} | {{$course->lecturer->position}} </h5>
        <p class="mt-2 mb-0">
          From  {{$course->lecturer->university->name}} , {{$course->lecturer->university->location}}</p>
          <h5 class="mb-2">
            <span class="badge badge-warning font-weight-lighter shadow">{{$course->fee}}</span>

          {{-- @if( $course->id == $course->id ) --}}
            {{-- <span class="badge badge-info shadow">{{$course->discount+=1}}students</span> --}}
            {{-- @endif --}}
          </h5>
          {{-- {{Auth::user()->id }} --}}
          {{-- {{$enrollments->student->user_id}} --}}
          {{-- @foreach($enrolls as $enroll) --}}
            {{-- @if(Auth::user()->id == $enroll->student->user_id) --}}
              {{-- <button type="button" class="btn btn-outline-success enroll shadow" id="enrolled">Enrolled</button> --}}
            {{-- @else --}}
              <button type="button" class="btn btn-outline-info enroll " id="enroll">Enroll Now</button>
            {{-- @endif --}}
          {{-- @endforeach --}}
        </div>
      </div>
    </div>
    <hr class="shadow-lg">
    <div class="container mb-5">
      <h3 class="mt-4 mb-4">Course content</h3>
      
      <div class="row">
        <div class="col-md-8">
          @foreach($coursedetails as $coursedetail)
          <div class="accordion m-1" id="accordionExample">
            <div class="card shadow">
              <div class="card-header" id="heading{{$coursedetail->week}}">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$coursedetail->week}}" aria-expanded="@if($coursedetail->week == 1) 'true' @else 'false' @endif" aria-controls="collapse{{$coursedetail->week}}">
                    Week {{$coursedetail->week}}
                  </button>
                </h2>
              </div>
              <div id="collapse{{$coursedetail->week}}" class="collapse @if( $coursedetail->week == 1) 'show' @endif m-3" aria-labelledby="heading{{$coursedetail->week}}" data-parent="#accordionExample">
                <h4 class="ml-4 mb-3">{{$coursedetail->chapter_title}}</h4>
                <div class="ml-4">
                  <p>
                    <a href="/file/{{$coursedetail->id}}" target="_blank">{{$coursedetail->chapter_title}} video: {{$coursedetail->video}}</a>
                  </p>
                  <hr>
                  <p>
                    <a href="/files/{{$coursedetail->id}}" target="_blank">
                      {{$coursedetail->chapter_title}} source :  {{$coursedetail->document}}</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
          <div class="col-md-4">
            <div class=" card p-3 shadow">
              <h5 class="mb-3 font-weight-bold">Course Info</h5>
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <td colspan="2">Week</td>
                    <td>{{$course->week }} Weeks Course</td>
                  </tr>
                  <tr>
                    <td colspan="2">Level</td>
                    <td>Intermediate</td>
                  </tr>
                  <tr>
                    <td colspan="2">Service</td>
                    <td>Full lifetime access</td>
                  </tr>
                  <tr>
                    <td colspan="2">How To Pass</td>
                    <td>Pass all graded assignments to complete the course.</td>
                  </tr>

                </tbody>
              </table>
            </div>

            <div class="mt-2 card p-5 shadow">
              <h5 class="mb-3 font-weight-bold">Requirements</h5>
              <ul>
                <li>Have a computer with Internet</li>
                <li>Have a computer with Internet</li>
                <li>Prepare to build real web apps!</li>
                <li>Brace yourself for stupid jokes about my dog Rusty</li>
              </ul>
            </div>
          </div>
      </div> 
    </div>
    
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="{{route('enrollment.store')}}" >
              @csrf
              <input type="hidden" name="course" value="{{$course->id}}">
              <input type="hidden" name="student" value="{{Auth::user()->id}}">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comfirm Message!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to Enroll?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info btn-sm">OK</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      {{-- For Video --}}
      {{-- <div class="modal fade " id="exModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form method="POST" action="" >
              @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <video width="470" height="310" controls>
                  <source src="{{url('backendtemplate/storage/'.$coursedetail->video)}}" type="video/mp4" class="playvideo">
                    Your browser does not support the video tag.
                  </video>
              </div>
            </form>
          </div>
        </div>
      </div> --}}
      {{-- For Document --}}
     {{--  <div class="modal fade " id="docModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form method="POST" action="" >
              @csrf
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                 <iframe src="{{url('backendtemplate/storage/'.$coursedetail->document)}}" width="770" height="600"></iframe>
              </div>
            </form>
          </div>
        </div>
      </div> --}}
      

      @endsection

      @section('script')
      <script type="text/javascript">
        $(document).ready(function() {
          $('.enroll').on('click',function(){
            $('#exampleModal').modal('show');
          });

          $('#exModal').on('click',function(){
            $('#exModal').modal('show');
           });

          $('.close').on('click',function(){
            $('.playvideo').modal('close');
           });

          $('.addDoc').on('click',function(){
            $('#{{$coursedetail->document}}').modal('show');
           });

        });

        </script>

@endsection