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
                                <th scope="col">assing driver</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($rentacars as $rentacar)
                                <tr data-id='{{ $rentacar->id }}'>
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
                                    <td>
                                        @if ($rentacar->payment_status == 0)
                                            <span class="badge badge-warning">pending</span>
                                        @else
                                            <span class="badge badge-success">paid</span>
                                        @endif
                                    </td>
                                    <td>{{ $rentacar->status }}</td>
                                   <td>
                                        @if ($rentacar->driver_id != null)
                                            {{ $rentacar->driver->name }} 
                                            @else
                                                <button 
                                                    type="button" 
                                                    data-rentcar-id='{{ $rentacar->id }}' 
                                                    class="assign-btn btn btn-primary"  
                                                    data-toggle="modal" 
                                                    data-target="#basicModal">
                                                    Assign Driver
                                                </button>
                                        @endif
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


<div class="modal fade" id="basicModal">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <select class="form-control" id="driverId">
                <option disabled selected>select driver</option>
                @foreach ($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
                
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="save-btn btn btn-primary">save</button>
        </div>
    </div>
</div>
</div>
@endsection

@push('admin_script')

<script>
$(document).ready(function(){
    $('.assign-btn').on('click',function(){
        let rentCarId = $(this).data('rentcar-id');
        $('.save-btn').data('id',rentCarId);
        // alert('rent a car id :'+rentCarId);
    })
    $('.save-btn').on('click',function(){
        let driverId = $('#driverId').val();
        let rentCarId = $(this).data('id');
        // alert('driver id :'+driverId+',rent a car id:'+rentCarId);
        
       $.ajax({
            url:'/admin/assign-driver/'+driverId+'/'+rentCarId,
            method:'GET',
            dataType:'json',
            success: function(data) {
                
               $('.modal').modal('hide'); 
                location.reload(); 
            },
            error:function(err){
                
            }
            
        });
    });
  
});

</script>
    
@endpush