<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return $request->user();
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $user->update($request->validated());

        return response()->json([
            'message' => 'Profile updated successfully',
            'user' => $user,
        ]);
    }
}
