@extends('backendtemplate')
@section('title','Majors')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >University Edit Form</h2>
    </div>
  </div>
</div>
<div class="container-fluid">
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
	<div class="container mt-4 ">
		<div class="row">
			<div class="col-md-12">
				<form method="post" action="{{route('majors.update',$major->id)}}" enctype="multipart/form-data">
				@csrf
				@method('PUT')
		
				<div class="form-group row">
					<label for="inpoutName" class="offset-md-1 col-sm-2 col-form-label">Name:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="inpoutName" name="name" value="{{$major->name}}">
					</div>
				</div>
				<div class="form-group row mt-4">
					<div class="offset-3 col-sm-8">
						<input type="submit" name="btnsubmit" value="Update" class="btn btn-outline-info">
					</div>
				</div>
			</form>
		</div>	
	</div>
</div>
</div>

@endsection