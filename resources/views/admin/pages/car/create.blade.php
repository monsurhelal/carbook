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
                <form action="{{ route('car.store') }}" method="POST">
                    @csrf
                   <div class="mb-3">
                        <label for="carName" class="form-label">Car Image</label>
                        <input type="file" class="dropify" data-height="300" />
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">Car Name</label>
                        <input type="text" class="form-control" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">Car Description</label>
                        {{-- <input type="text" class="form-control" id="summernote" aria-describedby="emailHelp"> --}}
                        <textarea class="ckeditor" name="ckeditor"></textarea>
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car mileage</label>
                        <input type="text" class="form-control" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car transmission</label>
                        <input type="text" class="form-control" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car seats</label>
                        <input type="text" class="form-control" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car luggage</label>
                        <input type="text" class="form-control" id="carName" aria-describedby="emailHelp">
                    </div>
                   <div class="mb-3">
                        <label for="carName" class="form-label">car fuel</label>
                        <input type="text" class="form-control" id="carName" aria-describedby="emailHelp">
                    </div>


                    @foreach ($features as $feature)
                        <span>{{ $feature->feature }}</span>
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
    });
    </script>
@endpush