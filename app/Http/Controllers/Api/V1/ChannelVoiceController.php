<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\ChannelVoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChannelVoiceController extends Controller
{
    public function __invoke(Request $request, $channel)
    {
        broadcast(new ChannelVoice($request->voice));

        return [
            'message' => 'success'
        ];
    }
}
