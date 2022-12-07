@extends('admin.layout.app')

@section('heading', 'Posts')
{{-- @section('button')
<a href="{{ route('admin_category_create') }}" class="btn btn-primary"><i class="fas
    fa-plus"></i> Add </a>
@endsection --}}

@section('main_content')
<div class="section-body">
    <a href="{{ route('admin_post_create') }}" class="btn btn-primary"><i class="fas
        fa-plus"></i> Add </a>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="example1">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Post Title</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Author</th>
                                    <th>Admin</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->post_title }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_post_edit',$row->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_post_delete',$row->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
</div>
@endsection