@extends('admin.layout.master')
@section('admin_title','price create page')

@push('admin_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

@endpush

@section('admin_main_content')

<div class="row">
<div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title">Driver Create</h4>
             <a class="btn btn-primary" href="{{ route('driver.index') }}">Back</a>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('driver.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="carName" class="form-label">driver photo</label>
                        <input type="file" name="image" class="dropify @error('image') is-invalid @enderror" data-height="300" />
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hourly" class="form-label">drive name</label>
                        <input type="text" name="driver_name" class="form-control input-rounded @error('driver_name') is-invalid @enderror" placeholder=" enter driver name">
                        @error('driver_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hourly" class="form-label">driver email</label>
                        <input type="text" name="driver_email" class="form-control input-rounded @error('driver_email') is-invalid @enderror" placeholder=" enter driver email">
                        @error('driver_email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hourly" class="form-label">driver mobile</label>
                        <input type="text" name="driver_mobile" class="form-control input-rounded @error('driver_mobile') is-invalid @enderror" placeholder=" enter driver mobile">
                        @error('driver_mobile')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="hourly" class="form-label">driver password</label>
                        <input type="text" name="driver_password" class="form-control input-rounded @error('driver_password') is-invalid @enderror" placeholder=" enter driver password">
                        @error('driver_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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

@push('admin_script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.dropify').dropify();
         
    });
    </script>
@endpush