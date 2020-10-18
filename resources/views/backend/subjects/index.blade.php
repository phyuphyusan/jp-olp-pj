@extends('backendtemplate')

@section('title','Subjects')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >Subjects List</h2>
    </div>
  </div>
</div>
<div class="container mt-4 ">
			<div class="row">
				<div class="col-md-12">
		<a href="{{route('subjects.create')}}" class="mb-2 btn btn-outline-info float-right btn-sm shadow"> +New</a>
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>No</th>
					<th>Major Name</th>
					<th>Name</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach(($subjects) as $subject)
				<tr>
					<td>{{$subject->id}}</td>
					@foreach($majors as $major)
						@if ($subject->major_id == $major->id)
							<td>{{$major->name}}</td>
						@endif 
					@endforeach
					
					<td>{{$subject->name}}</td>
					<td>
						<a href="{{route('subjects.edit',$subject->id)}}" class="btn-sm btn btn-outline-warning"><i class='fas fa-edit'></i></a>
						<form method="post" action="{{route('subjects.destroy',$subject->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')">
							@csrf
							@method('DELETE')
							<button type="submit" name="btn-submit" class="btn btn-outline-danger btn-delete btn-sm"><i class='fas fa-trash'></i></button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				
			</tfoot>
		</table>
	</div>
</div>
</div>

@endsection