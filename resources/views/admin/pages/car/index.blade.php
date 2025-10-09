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
                                <th scope="col">Last Updated </th>
                                <th scope="col">Image</th>
                                <th scope="col">features</th>
                                <th scope="col">car name</th>
                                <th scope="col">car description</th>
                                <th scope="col">car mileage</th>
                                <th scope="col">car transmission</th>
                                <th scope="col">car seats</th>
                                <th scope="col">car luggage</th>
                                <th scope="col">car fuel</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($cars as $car)
                                <tr>
                                    <td>{{ $car->updated_at->format('D-M-Y') }}</td>
                                    <th>
                                        <img src="{{ asset('admin/assets/images/cars/') }}/{{ $car->image }}" class="rounded" alt="Cinque Terre">
                                    </th>
                                    <td>
                                        @foreach ($car->features as $feature)
                                            <span class=" m-1 badge badge-primary">{{ $feature->feature }}</span>
                                        @endforeach
                                    </td>
                                    <td>{{ $car->car_name }}</td>
                                    <td>{{ Str::limit($car->car_description,50) }}</td>
                                    <td>{{ $car->car_mileage }}</td>
                                    <td>{{ $car->car_transmission }}</td>
                                    <td>{{ $car->car_seats }}</td>
                                    <td>{{ $car->car_luggage }}</td>
                                    <td>{{ $car->car_fuel }}</td>
                                   <td>
                                        <span>
                                            <a href="{{ route('car.edit',$car->id) }}" class="mr-4 btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i> Edit
                                            </a>
                                            <form class="d-inline form" action="{{ route('car.destroy',$car->id) }}" method="POST">
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