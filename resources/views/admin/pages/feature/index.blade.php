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
                        <thead class="thead-primary">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Last Updated </th>
                                <th scope="col">feature</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($features as $feature)
                                <tr>
                                    <th>{{ $feature->id }}</th>
                                    <td>{{ $feature->updated_at->format('D-M-Y') }}</td>
                                    <td>{{ $feature->feature }}</td>
                                   <td>
                                        <span>
                                            <a href="{{ route('feature.edit',$feature->id) }}" class="mr-4 btn btn-primary" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <i class="fa fa-pencil color-muted"></i> Edit
                                            </a>
                                            <form class="d-inline" action="{{ route('feature.destroy',$feature->id) }}" method="POST">
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