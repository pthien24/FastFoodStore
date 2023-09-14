@extends('layouts.admin')
@section('content')
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
        <form method="POST" action="{{ url('api/category/'.$viewData['category']->getId()).'/edit' }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" value="{{$viewData['category']->getName()}}" name="name" required>
            </div>
            <div class="form-group">
                <label for="course">Description</label>
                <input type="text" class="form-control" id="description" value="{{$viewData['category']->getDescription()}}" name="description" required>
            </div>

            <button type="submit" class="btn btn-primary">edit</button>
        </form>
    </div>
</div>
@endsection
