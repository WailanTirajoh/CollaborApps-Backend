<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnreadNotificationController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'notifications' => NotificationResource::collection(Auth::user()->unreadNotifications)
        ]);
    }
}
