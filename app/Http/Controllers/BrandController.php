<?php

namespace App\Http\Controllers;

use App\Http\Requests\Brands\CreateBrandRequest;
use App\Http\Requests\Brands\UpdateBrandRequest;
use App\Http\Requests\Brands\DeleteBrandRequest;
use App\Models\Brand;
use App\Traits\HttpResponses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
            // Check if the provided 'id' is not null
            if ($id !== null) {
                // Retrieve the brand data based on the provided 'id'
                $data = Brand::where('id', $request->id)->first();

                // Check if no data was found for the given 'id'
                if (!$data) {
                    // Return an error response with a "Not Found" status code
                    return $this->error('Brand not found', 404);
                }
            } else {
                // If 'id' is null, retrieve all brand data
                $data = Brand::all();
            }

            // Return a success response with the retrieved brand data
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
            // Validate the incoming request data
            $data = $request->validated();

            // Extract the 'name' and 'status' fields from the validated data
            $name = $data['name'];
            $status = $data['status'] ?? true; // If 'status' is not provided, default to true

            // Generate a URL-friendly slug based on the 'name' and a random string
            $slug = Str::slug($name, '-') . '-' . Str::lower(Str::random(8));

            // Start a database transaction to ensure data consistency
            DB::beginTransaction();

            // Create a new instance of the Brand model
            $brand = new Brand;

            // Set the attributes for the new brand
            $brand->name = $name;
            $brand->status = $status;
            $brand->slug = $slug;

            // Save the new brand to the database
            $brand->save();

            // Commit the transaction, making the changes permanent
            DB::commit();

            // Return a success response indicating brand creation was successful
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
            // Extract all data from the incoming request
            $data = $request->validated();

            // Extract the 'id' field from the data
            $id = $data['id'];

            // Find the brand with the given ID
            $brand = Brand::find($id);

            // Start a database transaction to ensure data consistency
            DB::beginTransaction();

            // Update the brand's 'name' and 'status' fields if provided in the request
            $brand->name = $data['name'] ?? $brand->name;
            $brand->status = $data['status'] ?? $brand->status;

            // If 'name' is provided in the request, update the brand's slug
            if (isset($data['name'])) {
                // Create a URL-friendly slug based on the 'name' and a random string
                $brand->slug = Str::slug($data['name'], '-') . '-' . Str::lower(Str::random(8));
            }

            // Save the updated brand information to the database
            $brand->save();

            // Commit the transaction, making the changes permanent
            DB::commit();

            // Return a success response indicating brand update was successful
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
     * @param DeleteBrandRequest $request
     * @return JsonResponse
     */

    public function delete(DeleteBrandRequest $request): JsonResponse
    {
        try {
            // Check if the current user's role is not equal to 1 (assuming role 1 is an admin)
            if (Auth::user()->role !== 1) {
                // If the user is not an admin, return an error message
                return $this->error('Access denied for this user');
            }

            $data = $request->validated();

            // Extract the validated brand ID from the data
            $id = $data['id'];

            // Find the brand with the given ID
            $brand = Brand::find($id);

            // Start a database transaction to ensure data consistency
            DB::beginTransaction();

            // Delete all products associated with the brand
            $brand->products()->delete();

            // Delete the brand itself
            $brand->delete();

            // Commit the transaction, making the changes permanent
            DB::commit();

            // Return a success response indicating brand deletion was successful
            return $this->success('Brand deleted successfully');
        } catch (\Exception $e) {
            return $this->log($e);
        }
    }
}