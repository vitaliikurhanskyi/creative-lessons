<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Product\UpdateRequest;
use App\Http\Requests\Product\FilterRequest;
use App\Http\Resources\Product\ProductResource;
use App\Servises\Product\ProductService;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{

    public $service;

    public function __construct(ProductService $post_service)
    {
        $this->service = $post_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(FilterRequest $request)
    {
//        $products = Product::paginate(10);
//        return ProductResource::collection($products);

        $product = Product::find(9);
        dd($product->ptags);

        $data = $request->validated();
//        $data = [
//          "price" => 20
//        ];
        //dd($data);

        $page = $data['page'] ?? 1;
        $per_page = $data['per_page'] ?? 10;

        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate($per_page, ['*'], 'page', $page);
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ProductResource
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'string',
            'price' => ''
        ];
        $data = request()->validate($rules);
        $product = Product::create($data);

        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return ProductResource
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $product = $this->service->update($product, $data);

        return new ProductResource($product);

        //return $data;
        //return redirect()->route('post.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
