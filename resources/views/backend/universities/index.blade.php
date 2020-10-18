@extends('backendtemplate')
@section('title','universities')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2 class="text-center text-monospace" >University Lists</h2>
    </div>
  </div>
</div>

<div class="container-fluid">
	<a href="{{route('universities.create')}}" class="m-2 btn btn-outline-info float-right btn-sm shadow"> +New</a>
	<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Photo</th>
      <th scope="col">Location</th>
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($universities as $university)
    <tr>
      <td>{{$university->id}}</td><!-- table's column name -->
      <td>{{$university->name}}</td>
      <td><img src="{{asset($university->photo)}}" width="100"></td>
      <td>{{$university->location}}</td>
      <td>
            <a href="{{route('universities.edit',$university->id)}}" class="btn btn-outline-warning btn-sm"><i class='fas fa-edit'></i></a>
            <form method="post" action="{{route('universities.destroy',$university->id)}}" class="d-inline-block " onsubmit="return confirm('Are you sure to delete?')">
              @csrf
              @method('DELETE')
              <button type="submit" name="btn-submit" class="btn btn-outline-danger btn-delete btn-sm"><i class='fas fa-trash'></i></button>
            </form>
          </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
  $(document).ready(function () {
  
   $("tbody").on("click",".deletebtn",function(e){

    if(!confirm("Do you really want to do this?")) {
       return false;
     }

    e.preventDefault();
    var id = $(this).data("id");
    // var id = $(this).attr('data-id');
    var token = $("meta[name='csrf-token']").attr("content");
    var url = e.target;

    $.ajax(
        {
          url: url.href, //or you can use url: "company/"+id,
          type: 'DELETE',
          data: {
            _token: token,
                id: id
        },
        success: function (response){

            $("#success").html(response.message)

            Swal.fire(
              'Remind!',
              'Company deleted successfully!',
              'success'
            )
             // location.reload(10000);
        }
     });
      return false;
   });
});
</script>

@endsection


