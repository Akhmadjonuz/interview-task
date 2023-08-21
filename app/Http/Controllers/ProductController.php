<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\ShowProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    use HttpResponses;

    /**
     * @group Product
     * 
     * Get product list
     * 
     * @authenticated
     * 
     * @response {
     * "result": [
     * ]
     * }
     * 
     * @param ShowProductRequest $request
     * @return JsonResponse
     */

    public function show(ShowProductRequest $request)
    {
        try {
            $data = $request->validated();

            $query = Product::query()->with(['category', 'brand'])->orderBy('id', 'desc');

            if (isset($data['price']))
                $query->where('price', $data['price']);

            if (isset($data['category_id']))
                $query->where('category_id', $data['category_id']);

            if (isset($data['brand_id']))
                $query->where('brand_id', $data['brand_id']);

            // make pagination
            $data = $query->paginate(10);

            return $this->success($data);
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }

    /**
     * @group Product
     * 
     * Create product
     * 
     * @authenticated
     * 
     * @bodyParam name string required The product's name.
     * @bodyParam photo file required The product's photo.
     * @bodyParam price string required The product's price.
     * @bodyParam category_id integer required The product's category id.
     * @bodyParam brand_id integer required The product's brand id.
     * @bodyParam status boolean nullable The product's status.
     * 
     * @response {
     * "result": "Product created successfully"
     * }
     * 
     * @param CreateProductRequest $request
     * @return JsonResponse
     */

    public function create(CreateProductRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $name = $data['name'];
            $category_id = $data['category_id'];
            $brand_id = $data['brand_id'];
            $status = $data['status'] ?? true;
            $price = $data['price'];

            DB::beginTransaction();

            // create product
            $product = new Product;
            $product->name = $name;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $path = $photo->store('public/products');
                $product->photo = str_replace('public', 'storage', $path);
            }

            $product->price = $price;
            $product->category_id = $category_id;
            $product->brand_id = $brand_id;
            $product->status = $status;
            $product->save();

            DB::commit();

            return $this->success('Product created successfully');
        } catch (\Exception $e) {
            $this->log($e);
        }
    }

    /**
     * @group Product
     * 
     * Update product
     * 
     * @authenticated
     * 
     * @bodyParam id integer required The product's id.
     * @bodyParam name string nullable The product's name.
     * @bodyParam photo file nullable The product's photo.
     * @bodyParam price string nullable The product's price.
     * @bodyParam category_id integer nullable The product's category id.
     * @bodyParam brand_id integer nullable The product's brand id.
     * @bodyParam status boolean nullable The product's status.
     * 
     * @response {
     * "result": "Product updated successfully"
     * }
     * 
     * @param UpdateProductRequest $request
     * @return JsonResponse
     */

    public function update(UpdateProductRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $id = $data['id'];

            DB::beginTransaction();

            // update product
            $product = Product::find($id);

            $product->name = $data['name'] ?? $product->name;

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $path = $photo->store('public/products');
                $product->photo = str_replace('public', 'storage', $path);
            }

            $product->price = $data['price'] ?? $product->price;
            $product->category_id = $data['category_id'] ?? $product->category_id;
            $product->brand_id = $data['brand_id'] ?? $product->brand_id;
            $product->status = $data['status'] ?? $product->status;
            $product->save();

            DB::commit();

            return $this->success('Product updated successfully');
        } catch (\Exception $e) {
            $this->log($e);
        }
    }

    /**
     * @group Product
     * 
     * Delete product
     * 
     * @authenticated
     * 
     * @bodyParam id integer required The product's id.
     * 
     * @response {
     * "result": "Product deleted successfully"
     * }
     * 
     * @param Request $request
     * @return JsonResponse
     */

    public function delete(Request $request): JsonResponse
    {
        try {
            if (Auth::user()->role !== 1)
                return $this->error('Access denied for this user');

            $data = $request->validate(
                [
                    'id' => 'required|integer|exists:products,id',
                ],
                [
                    'id.required' => 'The product id is required',
                    'id.integer' => 'The product id must be an integer',
                    'id.exists' => 'The product id must be exists',
                ]
            );

            $id = $data['id'];

            DB::beginTransaction();

            // delete product
            $product = Product::find($id);
            $product->delete();

            DB::commit();

            return $this->success('Product deleted successfully');
        } catch (\Exception $e) {
            $this->log($e);
        }
    }
}