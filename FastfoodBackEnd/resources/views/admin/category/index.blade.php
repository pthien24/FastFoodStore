<!-- resources/views/admin/students/index.blade.php -->
@extends('layouts.admin')
@section('content')
<!-- Button trigger modal -->
<div class="card mb-4">
    <div class="card-header">
        Create Products
    </div>
    <div class="card-body">
        @if($errors->any())
        <ul class="alert alert-danger list-unstyled">
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
        </ul>
        @endif
        <form method="POST" action="{{ url('api/category') }}">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="course">description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-content table-responsive table-full-width">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $category)
                    <tr>
                        <td>{{ $category->getId() }}</td>
                        <td>{{ $category->getName() }}</td>
                        <td>{{ $category->getDescription() }}</td>
                        <td class="td-actions text-right">
                            <div class="btn-group" role="group">
                                <a href="#" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">
                                    <i class="ti-user"></i>
                                </a>
                                <a href="{{ route('admin.category.edit', ['id' => $category->getId()]) }}" rel="tooltip" title="Edit Profile" class="btn btn-success btn-simple btn-xs">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <form action="{{ route('admin.category.destroy', ['id' => $category->getId()]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Remove" class="btn btn-danger btn-simple btn-xs"><i class="ti-close"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
