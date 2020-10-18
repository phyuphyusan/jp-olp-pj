@extends('backendtemplate')
@section('title','Majors')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >Add New Major Form</h2>
    </div>
  </div>
</div>
<div class="container mt-4 ">
	<div class="row">
		<div class="col-md-12">
			<form method="post" action="{{route('majors.store')}}" enctype="multipart/form-data">
				@csrf
					<div class="form-group row">
						<label for="inputName" class="offset-1 col-sm-2 col-form-label">Name:</label>
						<div class="col-sm-8 ">
							<input type="text" class="form-control" id="inputName" name="name">
							@error('name')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>
					<div class="form-group row mt-4">
						<div class="offset-3 col-sm-8">
							<input type="submit" class="btn btn-outline-info" name="btnsubmit" value="Save">
						</div>
					</div>
			</form>
		</div>
	</div>
</div>
@endsection