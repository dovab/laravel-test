@extends("index")

@section("title")
    New Product
@endsection

@section("contents")
    <h1>Create product</h1>

    <form action="{{route("products.store")}}" method="POST">
        @include("products.form-fields")

        <button type="submit" class="btn btn-primary">Create product</button>
        <a class="btn btn-secondary" href="{{route('products.index')}}">Cancel</a>
    </form>
@endsection
