@extends('admin.layout.master')
@section('admin_title','dashboard')

@section('admin_main_content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Feature List Page</h4>
                <a class="btn btn-primary" href="{{ route('feature.create') }}">Add New</a>
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
                                    <th>{{ $car->image }}</th>
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
                                            <a href="{{ route('feature.edit',$car->id) }}" class="mr-4 btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i> Edit
                                            </a>
                                            <form class="d-inline" action="{{ route('feature.destroy',$car->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Close">
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