@extends('admin.layout.master')
@section('admin_title','price edit page')

@section('admin_main_content')

<div class="row">
<div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title">Price update</h4>
             <a class="btn btn-primary" href="{{ route('price.index') }}">Back</a>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('price.update',$price->id) }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Input Select</label>
                        <select class="form-control" name="carId">
                            <option>select car</option>
                            @foreach ($cars as $car)
                                <option 
                                value="{{ $car->id }}"
                                    @if ($car->id == $price->car_id)
                                        selected
                                    @endif

                                >{{ $car->car_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hourly" class="form-label">Hourly Rate</label>
                        <input type="text" name="hourly" class="form-control input-rounded" value=" {{ $price->hourly }}">
                    </div>
                    <div class="form-group">
                        <label for="hourly" class="form-label">daily Rate</label>
                        <input type="text" name="daily" class="form-control input-rounded" value=" {{ $price->daily }}">
                    </div>
                    <div class="form-group">
                        <label for="hourly" class="form-label">monthly Rate</label>
                        <input type="text" name="monthly" class="form-control input-rounded" value=" {{ $price->monthly }}">
                    </div>
                    <div class="form-group">
                        <label for="hourly" class="form-label">fuel charge Rate</label>
                        <input type="text" name="fuelCharge" class="form-control input-rounded" value=" {{ $price->fuel_charge }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    
@endsection