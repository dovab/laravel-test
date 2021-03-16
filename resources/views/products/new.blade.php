@extends("index")

@section("title")
    New Product
@endsection

@section("contents")
    <h2>New product</h2>
    <form action="{{route("products.store")}}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="name" /><br />
        <textarea name="description" placeholder="description"></textarea><br />
        <input type="text" name="tags" placeholder="tags" /><br />
        <button type="submit">Submit</button>
    </form>
@endsection
