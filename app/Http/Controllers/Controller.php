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
        $response = [
            'message' => '',
            'errors' => $messages,
        ];
        return response()->json($response, 422, []);
    }
    
    protected function respondException($exception)
    {
        $response = [
            'message' => 'Exception',
            'error' => $exception->getMessage(),
        ];
        return response()->json($response, $exception->getCode(), []);
    }
    
    protected function respondUnauthorized($message = 'Unauthorized')
    {
        $response = [
            'message' => $message,
        ];
        return response()->json($response, 401, []);
    }

    protected function respondError($message = [], $errorCode = 422)
    {
        $response = [
            'message' => $message,
        ];
        return response()->json($response, $errorCode, []);
    }
    
    protected function respondSuccess($message ='Success', $data=[])
    {
        $response = [
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($response, 200, []);
    }
    
    protected function respondData($data=[])
    {
        $response = [
            'data' => $data,
        ];
        return response()->json($response, 200, []);
    }
    
    protected function respondMessage($message)
    {
        $response = [
            'message' => $message,
        ];
        return response()->json($response, 200, []);
    }       
    
}
