@extends('backendtemplate')
@section('title','CourseDetails')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >Course Details Create Form</h2>
    </div>
  </div>
</div>
<div class="container mt-4 ">
	<div class="row">
		<div class="col-md-12">
		{{-- Must show related input errors --}}

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>
            @endif

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
		<form action="{{route('coursedetails.store')}}" method="post" enctype="multipart/form-data">
			@csrf	
			<div class="form-group row {{ $errors->has('course') ? 'has-error' : '' }}">
				<label for="course" class="offset-md-1 col-md-2 col-form-label">Course</label>
				<div class="col-md-8">
					<select class="form-control form-control-md" id="course" name="course">
						<optgroup label="Choose Course">
							@foreach($courses as $course)
								<option value="{{$course->id}}">{{$course->name}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('course') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('week') ? 'has-error' : '' }}">
				<label for="week" class="offset-md-1 col-md-2 col-form-label">Week</label>
				<div class="col-md-8">
					<select class="form-control form-control-md week" id="week" name="week">
						<optgroup label="Choose Week">

						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('week') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('chapter_title') ? 'has-error' : '' }}">
				<label for="inputChapterTitle" class="offset-md-1 col-md-2 col-form-label">Chapter Title</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="inputChapterTitle" name="chapter_title">
					<span class="text-danger">{{ $errors->first('chapter_title') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('video') ? 'has-error' : '' }}">
				<label for="video" class="offset-1 col-sm-2 col-form-label">Video</label>
				<div class="col-md-8">
					<input type="file" name="video" class="d-block" id="video">
					<span class="text-danger">{{ $errors->first('video') }}</span>
				</div>
			</div>

			<div class="form-group row {{ $errors->has('document') ? 'has-error' : '' }}">
				<label for="document" class="offset-1 col-sm-2 col-form-label">Document</label>
				<div class="col-md-8">
					<input type="file" name="document" class="d-block" id="document">
					<span class="text-danger">{{ $errors->first('document') }}</span>
				</div>
			</div>
			<div class="form-group row mt-4">
				<div class="offset-3 col-md-5">
					<input type="submit" class="btn btn-outline-info" name="btnsubmit" value="Save">
				</div>
			</div>
		</form>
	</div>
</div>
</div>

@endsection