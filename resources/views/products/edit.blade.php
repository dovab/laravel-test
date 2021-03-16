@extends("index")

@section("title")
    Edit product {{$product->name}}
@endsection

@section("contents")
    <h1>Edit product {{$product->name}}</h1>

    <form action="{{route("products.update", ['product' => $product->id])}}" method="POST">
        @include("products.form-fields")

        <input type="hidden" name="_method" value="PUT" />

        <button type="submit" class="btn btn-primary">Edit product</button>
        <a class="btn btn-secondary" href="{{route('products.index')}}">Cancel</a>
    </form>
@endsection
