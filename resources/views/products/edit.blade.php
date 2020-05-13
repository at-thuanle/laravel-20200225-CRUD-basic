@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Product
            </div>
            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')
                {{-- Display flash message --}}
                @if (Session::has('eSuccess'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>{{ Session::get('eSuccess') }}</strong>
                    </div>
                @endif
                <!-- New Task Form -->
                <form action="{{ route('products.update', $product->id) }}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="product-name" class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="product-name" class="form-control" value="{{ $product->name}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-des" class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-6">
                            <textarea name="description" class="form-control" id="product-des">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-quantity" class="col-sm-3 control-label">Quantity</label>
                        <div class="col-sm-6">
                            <input type="text" name="quantity" id="product-quantity" class="form-control" value="{{ $product->quantity }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product-cateID" class="col-sm-3 control-label">Category ID</label>
                        <div class="col-sm-6">
                            <select name="cateID">
                                @foreach($category as $itemCateID)
                                <option value="{{ $itemCateID->id }}" {{ $itemCateID->id == $product->category_id ? "selected" : "" }}>{{ $itemCateID->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-success">
                            <i class="fa fa-btn fa-plus"></i>Update Product
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
