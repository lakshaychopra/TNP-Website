<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function respondValidationError($messages = null)
    {
 
        $data = [
            'message' => '',
            'errors' => $messages,
        ];
        return response()->json($data, 422, []);
    }
    protected function respondException($exception)
    {
 
        $data = [
            'message' => 'Exception',
            'error' => $exception->getMessage(),
        ];
        return response()->json($data, $exception->getCode(), []);
    }
    
}
