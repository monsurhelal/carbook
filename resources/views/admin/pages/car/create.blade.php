@extends('admin.layout.master')
@section('admin_title','feature create page')

@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

@endpush

@section('admin_main_content')

<div class="row">
<div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title">Feature Create</h4>
             <a class="btn btn-primary" href="{{ route('car.index') }}">Back</a>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('car.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="mb-3">
                        <label for="carName" class="form-label">Car Image</label>
                        <input type="file" name="image" class="dropify" data-height="300" />
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">Car Name</label>
                        <input type="text" class="form-control" name="car_name" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">Car Description</label>
                        {{-- <input type="text" class="form-control" id="summernote" aria-describedby="emailHelp"> --}}
                        <textarea class="ckeditor" name="ckeditor"></textarea>
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car mileage</label>
                        <input type="text" class="form-control" name="car_mileage" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car transmission</label>
                        <input type="text" class="form-control" name="car_transmission" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car seats</label>
                        <input type="text" class="form-control" name="car_seats" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car luggage</label>
                        <input type="text" class="form-control" name="car_luggage" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car fuel</label>
                        <input type="text" class="form-control" name="car_fuel" id="carName" aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <h4>select features for this car</h4>
                        <input type="checkbox" class="form-check-input" id="checkBox" value="">
                        <label class="form-check-label" for="check1">select all</span></label>
                    </div>
                    @foreach ($features->chunk(2) as $features)
                    <div class="row">
                        @foreach ($features as $feature)
                        <div class="col-md-6">
                            <div class="form-check mb-2">
                                <input type="checkbox" class="form-check-input feature_id"
                                 id="check1"
                                 name="featuresId[]"
                                 value="{{ $feature->id }}">
                                <label class="form-check-label" for="check1"><span>{{ $feature->feature }}</span></label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    
@endsection

@push('admin_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
    <script>
    $(document).ready(function() {
        $('.dropify').dropify();
        $('#checkBox').click(function(){
            if(this.checked){
            $('.feature_id').each(function(){
                this.checked = true;      
            });
            }else{
                $('.feature_id').each(function(){
                this.checked = false;      
            });
            }
        }); 
    });
    </script>
@endpush