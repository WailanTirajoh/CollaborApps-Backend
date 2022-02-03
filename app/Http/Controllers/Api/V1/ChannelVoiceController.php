<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\ChannelVoice;
use App\Http\Controllers\Controller;
use App\Models\Channel;
use Illuminate\Http\Request;

class ChannelVoiceController extends Controller
{
    public function store(Request $request, Channel $channel)
    {
        broadcast(new ChannelVoice($request->voice, $channel));

        return [
            'message' => 'success'
        ];
    }
}
