@extends('backendtemplate')

@section('title','Subjects')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >Subject Edit Form</h2>
    </div>
  </div>
</div>
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
	<div class="container mt-4 ">
		<div class="row">
			<div class="col-md-12">
				<form action="{{route('subjects.update',$subject->id)}}" method="post" enctype="multipart/form-data">
					@csrf
					@method('PUT')
					<div class="form-group row {{ $errors->has('major') ? 'has-error' : '' }}">
						<label for="inputMajor" class="offset-md-1 col-sm-2 col-form-label">Major</label>
						<div class="col-md-8">
							<select class="form-control form-control-md" id="inputMajor" name="major">
								<optgroup label="Choose Major">
									@foreach($majors as $major)
										<option value="{{$major->id}}" @if($subject ->major_id == $major->id){{'selected'}} @endif>{{$major->name}}</option>
									@endforeach	
								</optgroup>
							</select>
							<span class="text-danger">{{ $errors->first('major') }}</span>
						</div>
					</div>
					<div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="inputName" class="offset-md-1 col-sm-2 col-form-label">Name</label>
						<div class="col-md-8">
							<input type="text" class="form-control" id="inputName" name="name" value="{{$subject->name}}">
							<span class="text-danger">{{ $errors->first('name') }}</span>
						</div>
					</div>
					
					<div class="form-group row mt-4">
						<div class="offset-md-3 col-md-8">
							<input type="submit" class=" btn btn-outline-info" name="btnsubmit" value="Update">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

@endsection