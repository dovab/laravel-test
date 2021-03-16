@extends("index")

@section("title")
    Current Products
@endsection

@section("contents")
        <h1>Current Products</h1>

        @if (\App\Product::all()->count())
        <ul>
            @foreach (\App\Product::all() as $product)
            <li>
                {!! $product->name !!}
                <form action="{{route('products.destroy', ['product' => $product->id])}}" method="POST">
                    @csrf
                    <button type="submit">delete</button>
                </form>
            </li>
            @endforeach
        </ul>
        @else
            <p><em>No products have been created yet.</em></p>
        @endif

    <a href="{{route('products.create')}}">Add new product</a>
@endsection
