<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Models\Category;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use HttpResponses;

    /**
     * @group Category
     * 
     * Get category list
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
                $data = Category::where('id', $request->id)->first();

                if (!$data)
                    return $this->error('Category not found', 404);
            } else
                $data = Category::all();

            return $this->success($data);
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }


    /**
     * @group Category
     * 
     * Create category
     * 
     * @authenticated
     * 
     * @bodyParam name string required The category's name.
     * @bodyParam status boolean nullable The category's status.
     * 
     * @response {
     * "result": "Category created successfully"
     * }
     * 
     * @param CreateCategoryRequest $request
     * @return JsonResponse
     */

    public function create(CreateCategoryRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $name = $data['name'];
            $status = $data['status'] ?? true;

            $slug = Str::slug($name, '-') . '-' . Str::lower(Str::random(8));

            DB::beginTransaction();

            $category = new Category;
            $category->name = $name;
            $category->status = $status;
            $category->slug = $slug;
            $category->save();

            DB::commit();

            return $this->success('Category created successfully');
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }


    /**
     * @group Category
     * 
     * Update category
     * 
     * @authenticated
     * 
     * @bodyParam id integer required The category's id.
     * @bodyParam name string nullable The category's name.
     * @bodyParam status boolean nullable The category's status.
     * 
     * @response {
     * "result": "Category updated successfully"
     * }
     * 
     * @param UpdateCategoryRequest $request
     * @return JsonResponse
     */

    public function update(UpdateCategoryRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            $id = $data['id'];
            $category = Category::find($id);

            DB::beginTransaction();

            $category->name = $data['name'] ?? $category->name;
            $category->status = $data['status'] ?? $category->status;

            if (isset($data['name']))
                $category->slug = Str::slug($data['name'], '-') . '-' . Str::lower(Str::random(8));

            $category->save();

            DB::commit();

            return $this->success('Category updated successfully');
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }

    /**
     * @group Category
     * 
     * Delete category
     * 
     * @authenticated
     * 
     * @bodyParam id integer required The category's id.
     * 
     * @response {
     * "result": "Category deleted successfully"
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
                    'id' => 'required|integer|exists:categories,id'
                ],
                [
                    'id.required' => 'The category id is required',
                    'id.integer' => 'The category id must be an integer',
                    'id.exists' => 'The category id must be exists'
                ]
            );

            $id = $data['id'];
            $category = Category::find($id);

            DB::beginTransaction();

            $category->products()->delete();
            $category->delete();

            DB::commit();

            return $this->success('Category deleted successfully');
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }
}