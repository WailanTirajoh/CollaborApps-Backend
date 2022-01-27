<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        // $request->user()->tokens()->delete();
        $cookie = Cookie::forget('jwt');

        return response()->json([
            'message' => 'Success'
        ], Response::HTTP_OK)->withCookie($cookie);
    }
}
