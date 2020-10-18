@extends('backendtemplate')

@section('title','Courses')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >Course Lists</h2>
    </div>
  </div>
</div>

	<div class="container-fluid">
		<a href="{{route('courses.create')}}" class="mb-2 btn btn-outline-info float-right btn-sm shadow">+New</a>
		<table class="table table-bordered">
			<thead class="table-dark">
				<tr>
					<th>No</th>
					<th>Name</th>
					<th>Photo</th>
					<th>Description</th>
					<th>Week</th>
					<th>Fee</th>
					<th>Discount</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($courses as $course)
				<tr>
					<td>{{$course->id}}</td>
					<td>{{$course->name}}</td>
					<td><img src="{{asset($course->photo)}}" width="100"></td>
					<td>{{$course->description}}</td>
					<td>{{$course->week}}</td>
					<td>{{$course->fee}}</td>
					<td>{{$course->discount}}</td>
					<td>
						<a href="{{route('courses.edit',$course->id)}}" class="btn btn-outline-warning btn-sm"><i class='fas fa-edit'></i></a>
						<form method="post" action="{{route('courses.destroy',$course->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')">
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


<!-- Detail Modal -->
<div class="modal fade" id="detailModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title name"></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<img src="" class="img-fluid itemImg w-50 d-block mx-auto">
					</div>
					<div class="col-md-6 content">
						
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function () {
			$('.detailBtn').click(function () {
				// var photo = $(this).data('photo');
				var name = $(this).data('name');
				var description = $(this).data('description');
				var time = $(this).data('time_period');


				// $('.itemImg').attr('src',photo);
				$('.name').text(name);
				$('.content').html(`<p>${description} MMK</p>
									<p>${time}</p>`);

				$('#detailModal').modal('show');
			})
		})
	</script>
@endsection