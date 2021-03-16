@extends("index")

@section("title")
    Current Products
@endsection

@section("contents")
        <h1>Current Products</h1>

        @if (count($products) > 0)
        <ul class="list-group">
            @foreach ($products as $product)
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-9">{{$product->name}}</div>
                    <div class="col-sm-1">
                        <a class="btn btn-success" href="{{route('products.show', ['product' => $product->id])}}">View</a>
                    </div>
                    <div class="col-sm-1">
                        <a class="btn btn-warning" href="{{route('products.edit', ['product' => $product->id])}}">Edit</a>
                    </div>
                    <div class="col-sm-1">
                        <form action="{{route('products.destroy', ['product' => $product->id])}}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @else
            <p><em>No products have been created yet.</em></p>
        @endif

    <a class="btn btn-secondary mt-3" href="{{route('products.create')}}">Add new product</a>
@endsection
