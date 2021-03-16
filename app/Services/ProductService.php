<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    /**
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function list() {
        return Product::all();
    }

    /**
     * Gets the product instance for the id
     *
     * @param int $id
     * @return Product
     */
    public function get(int $id): Product {
        return Product::find($id);
    }

    /**
     * Creates a new product
     *
     * @param array $values
     * @return Product
     */
    public function create(array $values): Product {
        $product = new Product();
        $product->name = $values["name"];
        $product->description = $values["description"];
        $product->save();

        return $product;
    }

    /**
     * Updates the selected product
     *
     * @param int $id
     * @param array $values
     * @return Product
     */
    public function update(int $id, array $values): Product {
        $product = Product::find($id);
        $product->name = $values["name"];
        $product->description = $values["description"];
        $product->save();

        return $product;
    }

    /**
     * Removes the selected product
     *
     * @param int $id
     * @return Product
     */
    public function delete(int $id): Product {
        $product = Product::find($id);
        $product->delete();

        return $product;
    }
}
