@extends('admin.layout.master')
@section('admin_title','feature create page')

@section('admin_main_content')

<div class="row">
<div class="col-md-12">
        <div class="card">
        <div class="card-header">
            <h4 class="card-title">Feature Create</h4>
             <a class="btn btn-primary" href="{{ route('feature.index') }}">Back</a>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('feature.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="feature_name" class="form-control input-rounded" placeholder="Features Name">
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