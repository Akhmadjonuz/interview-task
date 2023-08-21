<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brands\CreateBrandRequest;
use App\Http\Requests\Brands\UpdateBrandRequest;
use App\Models\Brand;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    use HttpResponses;

    /**
     * @group Brand
     * 
     * Get brand list
     * 
     * @authenticated
     * 
     * @response {
     * "result": [
     * ]
     * }
     * 
     * @param Request $request
     * @return JsonResponse
     */

    public function show(Request $request, $id = null): JsonResponse
    {
        try {
            if ($id !== null) {
                $data = Brand::where('id', $request->id)->first();

                if (!$data)
                    return $this->error('Brand not found', 404);
            } else
                $data = Brand::all();

            return $this->success($data);
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }


    /**
     * @group Brand
     * 
     * Create brand
     * 
     * @authenticated
     * 
     * @bodyParam name string required The brand's name.
     * @bodyParam status boolean nullable The brand's status.
     * 
     * @response {
     * "result": "Brand created successfully"
     * }
     * 
     * @param CreateBrandRequest $request
     * @return JsonResponse
     */

    public function create(CreateBrandRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $name = $data['name'];
            $status = $data['status'] ?? true;

            $slug = Str::slug($name, '-') . '-' . Str::lower(Str::random(8));

            DB::beginTransaction();

            $brand = new Brand;
            $brand->name = $name;
            $brand->status = $status;
            $brand->slug = $slug;
            $brand->save();

            DB::commit();

            return $this->success('Brand created successfully');
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }


    /**
     * @group Brand
     * 
     * Update brand
     * 
     * @authenticated
     * 
     * @bodyParam id integer required The brand's id.
     * @bodyParam name string nullable The brand's name.
     * @bodyParam status boolean nullable The brand's status.
     * 
     * @response {
     * "result": "Brand updated successfully"
     * }
     * 
     * @param UpdateBrandRequest $request
     * @return JsonResponse
     */

    public function update(UpdateBrandRequest $request): JsonResponse
    {
        try {
            $data = $request->all();

            $id = $data['id'];
            $brand = Brand::find($id);

            DB::beginTransaction();

            $brand->name = $data['name'] ?? $brand->name;
            $brand->status = $data['status'] ?? $brand->status;

            if (isset($data['name']))
                $brand->slug = Str::slug($data['name'], '-') . '-' . Str::lower(Str::random(8));

            $brand->save();

            DB::commit();

            return $this->success('Brand updated successfully');
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }

    /**
     * @group Brand
     * 
     * Delete brand
     * 
     * @authenticated
     * 
     * @bodyParam id integer required The brand's id.
     * 
     * @response {
     * "result": "Brand deleted successfully"
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
                    'id' => 'required|integer|exists:brands,id'
                ],
                [
                    'id.required' => 'The brand id field is required.',
                    'id.integer' => 'The brand id field must be an integer.',
                    'id.exists' => 'The selected brand id is invalid.',
                ]
            );

            $id = $data['id'];
            $brand = Brand::find($id);

            DB::beginTransaction();

            $brand->products()->delete();
            $brand->delete();

            DB::commit();

            return $this->success('Brand deleted successfully');
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }
}