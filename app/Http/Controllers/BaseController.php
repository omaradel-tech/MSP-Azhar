<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    //

    public function success($data)
    {
        return response()->json([
            'data'=> $data,
            'message' => 'success',
        ],200);
    }

    public function error($data)
    {
        return response()->json([
            'message' => 'error',
        ],404);
    }
}
