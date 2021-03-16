<?php

namespace App\Services;

use App\Events\ProductCreated;
use App\Models\Product;
use App\Models\Tag;

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

        $this->processTags($product, explode(",", $values['tags']));

        ProductCreated::dispatch($product);

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

        $this->processTags($product, explode(",", $values['tags']));

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

    /**
     * @param Product $product
     * @param array $tags
     */
    private function processTags(Product $product, array $tags) {
        // Remove all tags
        $product->tags()->detach();

        // Add the tags sent in this request
        foreach($tags as $tag) {
            // Clean the tag
            $tag = trim($tag);

            // Skip empty strings as tag
            if ('' === $tag) {
                continue;
            }

            // Check if the tag exists
            $tagModel = Tag::where('tag', $tag)->get()->first();
            if (null === $tagModel) {
                $tagModel = new Tag();
                $tagModel->tag = $tag;
                $tagModel->save();
            }

            $product->tags()->attach($tagModel->id);
        }
    }
}
