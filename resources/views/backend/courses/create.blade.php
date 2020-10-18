@extends('backendtemplate')

@section('title','Courses')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >Course Create Form</h2>
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
		<form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
				<label for="inputName" class="offset-md-1 col-md-2 col-form-label">Name</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="inputName" name="name">
					<span class="text-danger">{{ $errors->first('name') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('photo') ? 'has-error' : '' }}">
				<label for="inputPhoto" class="offset-1 col-sm-2 col-form-label">Photo</label>
				<div class="col-md-8">
					<input type="file" id="inputPhoto" name="photo" class="d-block">
					<span class="text-danger">{{ $errors->first('photo') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('description') ? 'has-error' : '' }}">
				<label for="inputDescription" class="offset-md-1 col-sm-2 col-form-label">Description</label>
				<div class="col-md-8">
					<textarea id="inputDescription" class="form-control" name="description"></textarea>
					<span class="text-danger">{{ $errors->first('description') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('week') ? 'has-error' : '' }}">
				<label for="week" class="offset-1 col-sm-2 col-form-label">Week</label>
				<div class="col-md-8">
					<input type="number" id="week" name="week" class="form-control">
					<span class="text-danger">{{ $errors->first('week') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('fee') ? 'has-error' : '' }}">
				<label for="inputFee" class="offset-md-1 col-md-2 col-form-label">Fee</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="inputFee" name="fee">
					<span class="text-danger">{{ $errors->first('fee') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('discount') ? 'has-error' : '' }}">
				<label for="inputDiscount" class="offset-md-1 col-md-2 col-form-label">Discount</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="inputDiscount" name="discount">
					<span class="text-danger">{{ $errors->first('discount') }}</span>
				</div>
			</div>
			<div class="form-group row {{ $errors->has('major') ? 'has-error' : '' }}">
				<label for="major" class="offset-1 col-sm-2 col-form-label">Major</label>
					<div class="col-md-8">
						<select class="form-control form-control-md" id="major" name="major">
							<optgroup label="Choose Major">
								@foreach($majors as $major)
								<option value="{{$major->id}}">{{$major->name}}</option>
								@endforeach	
							</optgroup>
						</select>
						<span class="text-danger">{{ $errors->first('major') }}</span>
					</div>
			</div>
			<div class="form-group row {{ $errors->has('subject') ? 'has-error' : '' }}">
				<label for="subject" class="offset-md-1 col-md-2 col-form-label">Subject</label>
				<div class="col-md-8">
					<select class="form-control form-control-md" id="major" name="subject">
						<optgroup label="Choose Subject">
							<!-- @foreach($subjects as $subject)
								<option value="{{$subject->id}}">{{$subject->name}}</option>
							@endforeach	 -->
						</optgroup>
					</select>
					<span class="text-danger">{{ $errors->first('subject') }}</span>
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