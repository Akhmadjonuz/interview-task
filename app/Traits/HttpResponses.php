<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use PhpParser\Error;

trait HttpResponses
{


  /**
   * Success message http response json
   * @param array|string $data
   * @param integer $code
   * @return JsonResponse
   */
  protected function success($data,  $code = 200)
  {
    return response()->json(['result' => $data], $code);
  }


  /**
   * Error message http response json
   * @param array|string $data
   * @param integer $code
   * @return JsonResponse
   */
  protected function error($data, $code = 400)
  {
    return response()->json(['result' => $data], $code);
  }

  /**
   * Error message http response json
   * @param \Exception $e
   * @return JsonResponse
   */
  protected function log($e)
  {
    Log::error($e->getMessage() . "\n" . $e->getTraceAsString());
    return response()->json(['data' => '500 Error Server'], 500);
  }
}
