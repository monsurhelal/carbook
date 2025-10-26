@extends('admin.layout.master')
@section('admin_title','price')

@push('admin_style')
<style>

</style>
@endpush

@section('admin_main_content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Feature List Page</h4>
                <a class="btn btn-primary" href="{{ route('driver.create') }}">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Last Updated </th>
                                <th scope="col">drivers image</th>
                                <th scope="col">name</th>
                                <th scope="col">email</th>
                                <th scope="col">phone</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($drivers as $driver)
                                <tr>
                                    <th>{{ $driver->id }}</th>
                                    <td>{{ $driver->updated_at->format('D-M-Y') }}</td>
                                    <td>
                                        <img style="width: 80px" src="{{ asset('admin/assets/images/drivers') }}/{{ $driver->photo }}" alt="">
                                    </td>
                                    <td>{{ $driver->name }}</td>
                                    <td>{{ $driver->email }}</td>
                                    <td>{{ $driver->mobile }}</td>
                                   <td>
                                        <span>
                                            <a href="{{ route('driver.edit',$driver->id) }}" class="mr-4 btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i> Edit
                                            </a>
                                            <form class="d-inline form" action="{{ route('driver.destroy',$driver->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger show_confirm" data-toggle="tooltip" data-placement="top" title="Close">
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