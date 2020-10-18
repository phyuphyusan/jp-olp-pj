@extends('backendtemplate')

@section('title','Courses')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >Course Edit Form</h2>
    </div>
  </div>
</div>
<div class="container mt-4 ">
	<div class="row">
		<div class="col-md-12">

		{{-- Must show related input errors --}}

		<!-- @if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif -->
		<form action="{{route('courses.update',$course->id)}}" method="post" enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="form-group row {{ $errors->has('lecturer') ? 'has-error' : '' }}">
				<label for="inputLecturer" class="offset-md-1 col-md-2 col-form-label">Lecturer</label>
				<div class="col-md-8">
					<select class="form-control form-control-md" id="inputLecturer" name="lecturer">
						<optgroup label="Choose Lecturer">
							@foreach($lecturers as $lecturer)
								<option value="{{$lecturer->id}}">{{$lecturer->id}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('lecturer') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="inputName" class="offset-1 col-sm-2 col-form-label">Name</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="inputName" name="name" value="{{$course->name}}">
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPhoto" class="offset-1 col-sm-2 col-form-label">Photo</label>
				<div class="col-md-8">
					<input type="file" id="inputPhoto" name="photo">
					<img src="{{asset($course->photo)}}" width="100">
				</div>
			</div>
			<div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
				<label for="inputDescription" class="offset-1 col-sm-2 col-form-label">Description</label>
				<div class="col-md-8">
					<textarea id="inputDescription" class="form-control" name="description">{{$course->description}}</textarea>
					<span class="text-danger">{{ $errors->first('description') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('week') ? 'has-error' : '' }}">
				<label for="inputWeek" class="offset-1 col-sm-2 col-form-label">Week</label>
				<div class="col-md-8">
					<input type="number" id="inputWeek" name="week" class="form-control">
					<span class="text-danger">{{ $errors->first('week') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('fee') ? 'has-error' : '' }}">
				<label for="inputFee" class="offset-1 col-sm-2 col-form-label">Fee</label>
				<div class="col-md-8">
					<textarea id="inputFee" class="form-control" name="fee">{{$course->fee}}</textarea>
					<span class="text-danger">{{ $errors->first('fee') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('discount') ? 'has-error' : '' }}">
				<label for="inputDiscount" class="offset-1 col-sm-2 col-form-label">Discount</label>
				<div class="col-md-8">
					<textarea id="inputDiscount" class="form-control" name="discount">{{$course->discount}}</textarea>
					<span class="text-danger">{{ $errors->first('discount') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('subject') ? 'has-error' : '' }}">
				<label for="inputSubject" class="offset-1 col-sm-2 col-form-label">Subject</label>
				<div class="col-md-8">
					<select class="form-control form-control-md" id="inputSubject" name="subject">
						<optgroup label="Choose Subject">
							@foreach($subjects as $subject)
								<option value="{{$subject->id}}" @if($subject ->id == $course->subject){{'selected'}} @endif>{{$subject->name}}</option>
							@endforeach	
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('subject') }}</span>
				</div>
			</div>
			<div class="form-group row mt-4">
				<div class="offset-3 col-md-8">
					<input type="submit" name="btnsubmit" value="Update" class="btn btn-outline-info">
				</div>
			</div>
		</form>
	</div>
</div>
</div>

@endsection