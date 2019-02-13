<?php

namespace App\Http\Controllers\Api\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductResourceCollection;
use App\Http\Requests\ProductRequest;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware('auth:api')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(20);
        return ProductResourceCollection::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->stock = $request->stock;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->save();

        //Response
        return response([
            'data' => new ProductResource($product)
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request['detail'] = $request->description;
        unset($request->description);
        $product->update($request->all());

        //Response
        return response([
            'data' => new ProductResource($product)
        ], Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
