
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $category->name }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <h5>Description:</h5>
                        <p>{{ $category->description }}</p>
                    </div>

                    <div class="mb-3">
                        <h5>Products in this category:</h5>
                        @if($category->products->count() > 0)
                            <ul class="list-group">
                                @foreach($category->products as $product)
                                    <li class="list-group-item">
                                        <a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>No products found in this category.</p>
                        @endif
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary">Edit Category</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete Category</button>
                        </form>
                        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
