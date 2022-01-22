<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePhotoController extends Controller
{
    public function delete()
    {
        $user = Auth::user();
        if ($user->getFirstMedia('user_profile')) {
            $user->deleteMedia($user->getFirstMedia('user_profile')->id);
            $message = 'Photo deleted';
        } else {
            $message = 'No photo to delete';
        }

        return response()->json([
            'message' => $message
        ]);
    }
}
