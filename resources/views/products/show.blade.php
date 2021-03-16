@extends("index")

@section("title")
    Viewing product {{$product->name}}
@endsection

@section("contents")
    <h1>Viewing product {{$product->name}}</h1>

    <div class="row mt-2">
        <div class="col-sm-6">Name</div>
        <div class="col-sm-6">{{$product->name}}</div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-6">Description</div>
        <div class="col-sm-6">{{$product->description}}</div>
    </div>
    <div class="row mt-2">
        <div class="col-sm-6">Tags</div>
        <div class="col-sm-6">{{$product->tags}}</div>
    </div>

    <div class="row mt-5">
        <div class="col-sm-12">
            <a href="{{route('products.index')}}" class="btn btn-secondary">Go back</a>
        </div>
    </div>
@endsection
