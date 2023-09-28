<!-- resources/views/admin/students/index.blade.php -->
@extends('layouts.admin')
@section('content')
<h1>Student Management</h1>
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
        <form method="POST" action="{{ url('api/products') }}"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" value="{{ old('name') }}" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Category:</label>
                <select name="category_id" id="category_id" required>
                    <option value="">Select a category</option>
                    @foreach($viewData["category"] as $category)
                    <option value="{{ $category->getId() }}">{{ $category->getName() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
                <input name="price" value="{{ old('price') }}" type="number" class="form-control">
            </div>
            <div class="form-group"><label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Image:</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input class="form-control" type="file" name="image">
                        </div></div>
            <div class="form-group">
                <label for="course">description</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
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
                        <th>image</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData['products'] as $products)
                    <tr>
                        <td>{{ $products->getId() }}</td>
                        <td>{{ $products->getName() }}</td>
                        <td>{{ $products->getDescription() }}</td>
                        <td><img src="{{ asset('/storage/' . $products->getImage()) }}"></td>
                        <td class="td-actions text-right">
                            <div class="btn-group" role="group">
                                <a href="#" rel="tooltip" title="View Profile" class="btn btn-info btn-simple btn-xs">
                                    <i class="ti-user"></i>
                                </a>
                                <a href="{{ route('admin.products.edit', ['id' => $products->getId()]) }}" rel="tooltip" title="Edit Profile" class="btn btn-success btn-simple btn-xs">
                                    <i class="ti-pencil-alt"></i>
                                </a>
                                <form action="{{ route('admin.category.destroy', ['id' => $products->getId()]) }}" method="POST">
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
