<?php


namespace App\Servises\Product;

use App\Models\Product;

class ProductService
{

    public function store($data)
    {
//        $tags = $data['tags'];
//        unset($data['tags']);
//        $post = Post::create($data);
//        $post->tags()->attach($tags);
    }

    public function update($product, $data)
    {
        $product->update($data);
        return $product->fresh();
    }
}
