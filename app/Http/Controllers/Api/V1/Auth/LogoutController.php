<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function __invoke()
    {
        Auth::user()->tokens()->delete();

        return response()->json([
            'message' => 'Success logout'
        ], Response::HTTP_OK);
    }
}
