<?php

namespace App\Traits;

Trait HttpResponse{

   protected function success($data = [],$message = '',$code = 200)
    {
        return response()->json(
            [
                'status'=>'Request Has Successful',
                'data'=>$data,
                'message'=>$message,

            ],
            $code
        );
    }
    protected function error($data = [],$message = '',$code = 422)
    {
        return response()->json(
            [
                'status'=>'Error Accured',
                'data'=>$data,
                'message'=>$message,

            ],
            $code
        );
    }
}
