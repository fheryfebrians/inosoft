<?php

namespace App\Traits;

trait ResponseAPI
{
    /**
     * Core of response
     * 
     * @param   string          $message
     * @param   array|object    $data
     * @param   integer         $statusCode  
     * @param   boolean         $isSuccess
     */
    public function coreResponse($message, $data = null, $statusCode, $isSuccess = true)
    {
        if(!$message) return response()->json(['message' => 'Message is required'], 500);

        if($isSuccess) {
            return response()->json([
                'status' => $statusCode,
                'message' => $message,
                'data' => $data
            ], $statusCode);
        } else {
            return response()->json([
                'status' => $statusCode,
                'message' => $message,
            ], $statusCode);
        }
    }

    /**
     * Send any success response
     * 
     * @param   string          $message
     * @param   array|object    $data
     * @param   integer         $statusCode
     */
    public function success($message, $data, $statusCode = 200)
    {
        return $this->coreResponse($message, $data, $statusCode);
    }

    /**
     * Send any error response
     * 
     * @param   string          $message
     * @param   integer         $statusCode    
     */
    public function error($message, $statusCode)
    {
        $status = 500;
        return $this->coreResponse($message, null, $status, false);
    }
}