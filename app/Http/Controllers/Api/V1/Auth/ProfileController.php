<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        return [
            'id' => $user->id,
            'name' => $user->name,
            'avatar' => $user->image,
        ];
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();
        $user->update($request->validated());

        if ($request->avatar) $user->replaceImage($request->avatar, (new User)->mediaName);

        return response()->json([
            'message' => 'Profile updated successfully',
        ]);
    }
}
