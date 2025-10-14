@extends('admin.layout.master')
@section('admin_title','dashboard')

<style>
    img.rounded {
    height: 79px;
    width: 80px;
    border-radius: 50% !important;
}
</style>

@section('admin_main_content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Car List Page</h4>
                <a class="btn btn-primary" href="{{ route('car.create') }}">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">mobile</th>
                                <th scope="col">car</th>
                                <th scope="col">pick_up_location</th>
                                <th scope="col">drop_off_location</th>
                                <th scope="col">pick_up_date</th>
                                <th scope="col">drop_off_date</th>
                                <th scope="col">pick_up_time</th>
                                <th scope="col">payment</th>
                                <th scope="col">payment_status</th>
                                <th scope="col">status</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rentacars as $rentacar)
                                <tr>
                                    <td>{{ $rentacar->user->name }}</td>
                                    <td>{{ $rentacar->user->email }}</td>
                                    <td>{{ $rentacar->user->mobile }}</td>
                                    <td>{{ $rentacar->car->car_name }}</td>
                                    <td>{{ $rentacar->pick_up_location}}</td>
                                    <td>{{ $rentacar->drop_off_location }}</td>
                                    <td>{{ $rentacar->pick_up_date }}</td>
                                    <td>{{ $rentacar->drop_off_date }}</td>
                                    <td>{{ $rentacar->pick_up_time }}</td>
                                    <td>{{ $rentacar->payment }}</td>
                                    <td>{{ $rentacar->payment_status }}</td>
                                    <td>{{ $rentacar->status }}</td>
                                   <td>
                                        <span>
                                            <a href="{{ route('car.edit',$rentacar->id) }}" class="mr-4 btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i> Edit
                                            </a>
                                            <form class="d-inline form" action="{{ route('car.destroy',$rentacar->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger show_confirm" type="submit" data-toggle="tooltip" data-placement="top" title="Close">
                                                    <i class="fa fa-close color-danger"></i> Delete
                                                </button>
                                            </form>
                                            
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('admin_script')

<script>
$(document).ready(function(){
  $('.show_confirm').click(function(event){
    event.preventDefault();
    let form = $('.form');
    Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    form.submit();
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
    }
    });
  });
});

</script>
    
@endpush