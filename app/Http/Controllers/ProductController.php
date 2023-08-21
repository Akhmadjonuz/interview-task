<?php

namespace App\Http\Controllers;

use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\SearchProductRequest;
use App\Http\Requests\Products\ShowProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Product;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use HttpResponses;

    /**
     * @group Product
     * 
     * Get product list
     * 
     * @queryParam price string The product's price.
     * @queryParam category_id integer The product's category id.
     * @queryParam brand_id integer The product's brand id.
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

            // get product list
            $query = Product::query()->with(['category', 'brand'])->orderBy('id', 'desc');

            // filter by price, category_id, brand_id
            if (isset($data['price']))
                $query->where('price', $data['price']);

            if (isset($data['category_id']))
                $query->where('category_id', $data['category_id']);

            if (isset($data['brand_id']))
                $query->where('brand_id', $data['brand_id']);

            // make pagination
            $data = $query->paginate(10);

            // return response
            return $this->success($data);
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }

    /**
     * @group Product
     * 
     * Search product
     * 
     * @queryParam id integer The product's id.
     * @queryParam name string The product's name.
     * @queryParam slug string The product's slug.
     * 
     * @response {
     * "result": [
     * ]
     * }
     * 
     * @param SearchProductRequest $request
     * @return JsonResponse
     */

    public function search(SearchProductRequest $request)
    {
        try {
            $data = $request->validated();

            // Initialize the query
            $query = Product::query()->with(['category', 'brand'])->orderBy('id', 'desc');

            // Search by id
            if (isset($data['id'])) {
                $query->where('id', $data['id']);
            }

            // Search by name
            if (isset($data['name'])) {
                $query->where('name', 'like', '%' . $data['name'] . '%');
            }

            // Search by slug
            if (isset($data['slug'])) {
                $slug = mb_stripos($data['slug'], '-') === false
                    ? Str::slug($data['slug'], '-')
                    : $data['slug'];

                $query->where(function ($q) use ($slug) {
                    $q->whereHas('category', function ($categoryQuery) use ($slug) {
                        $categoryQuery->where('slug', 'like', '%' . $slug . '%');
                    })->orWhereHas('brand', function ($brandQuery) use ($slug) {
                        $brandQuery->where('slug', 'like', '%' . $slug . '%');
                    });
                });
            }

            // Pagination
            $data = $query->paginate(10);

            // Return response
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

            // begin transaction to save data
            DB::beginTransaction();

            // create product
            $product = new Product;
            $product->name = $name;

            // upload photo if exists
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $path = $photo->store('public/products');
                $product->photo = str_replace('public', 'storage', $path);
            }

            $product->price = $price;
            $product->category_id = $category_id;
            $product->brand_id = $brand_id;
            $product->status = $status;

            // save product
            $product->save();

            // commit transaction
            DB::commit();

            // return response
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

            // begin transaction to save data
            DB::beginTransaction();

            // update product
            $product = Product::find($id);

            $product->name = $data['name'] ?? $product->name;

            // upload photo if exists
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $path = $photo->store('public/products');
                $product->photo = str_replace('public', 'storage', $path);
            }

            $product->price = $data['price'] ?? $product->price;
            $product->category_id = $data['category_id'] ?? $product->category_id;
            $product->brand_id = $data['brand_id'] ?? $product->brand_id;
            $product->status = $data['status'] ?? $product->status;

            // save product
            $product->save();

            // commit transaction
            DB::commit();

            // return response
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
            // check if user is admin
            if (Auth::user()->role !== 1)
                return $this->error('Access denied for this user');

            // validate request
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

            // begin transaction to save data
            DB::beginTransaction();

            // delete product
            $product = Product::find($id);
            $product->delete();

            // commit transaction
            DB::commit();

            // return response
            return $this->success('Product deleted successfully');
        } catch (\Exception $e) {
            $this->log($e);
        }
    }
}