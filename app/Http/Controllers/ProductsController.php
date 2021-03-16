<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view("products.index")->with("products", $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products.new");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => ["required", "unique:products", "max:64"],
            "description" => ["required"],
        ]);

        $product = new Product();
        $product->name = $validated["name"];
        $product->description = $validated["description"];
        $product->save();

        return redirect("/products")->with("status", "Product saved");
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $product = Product::find($id);

        return view("products.show")->with("product", $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $product = Product::find($id);

        return view("products.edit")->with("product", $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            "name" => ["required", "unique:products", "max:64"],
            "description" => ["required"],
        ]);

        $product = Product::find($id);
        $product->name = $validated["name"];
        $product->description = $validated["description"];
        $product->save();

        return redirect("/products")->with("status", "Product saved");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect("/products")->with("status", "Product {$product->name} was deleted");
    }
}
