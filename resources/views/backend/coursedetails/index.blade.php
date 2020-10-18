@extends('backendtemplate')

@section('title','CourseDetails')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >CourseDetails Lists</h2>
    </div>
  </div>
</div>

	<div class="container-fluid">
		<a href="{{route('coursedetails.create')}}" class="mb-2 btn btn-outline-info float-right btn-sm shadow">+New</a>
		<table class="table table-bordered">
			<thead class="table-dark">
				<tr>
					<th>No</th>
					<th>Week</th>
					<th>Chapter Title</th>
					<th>Video</th>
					<th>Document</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($coursedetails as $coursedetail)
				<tr>
					<td>{{$coursedetail->id}}</td>
					<td>{{$coursedetail->week}}</td>
					<td>{{$coursedetail->chapter_title}}</td>
					<td><a href="/files/{{$coursedetail->id}}" >{{$coursedetail->video}}</a></td>
					<td><a href="/files/{{$coursedetail->id}}">{{$coursedetail->document}}</a></td>
					<td>
						<a href="{{route('coursedetails.edit',$coursedetail->id)}}" class="btn btn-outline-warning btn-sm"><i class='fas fa-edit'></i></a>
						<form method="post" action="{{route('coursedetails.destroy',$coursedetail->id)}}" class="d-inline-block" onsubmit="return confirm('Are you sure to delete?')">
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

		<div class="row float-right">
			{{$coursedetails->links()}}
		</div>
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
	<!-- <script type="text/javascript">
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
	</script> -->
@endsection