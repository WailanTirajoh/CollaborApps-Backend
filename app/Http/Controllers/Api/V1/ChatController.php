<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\ChatCreated;
use App\Events\ChatDeleted;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Http\Requests\StoreChatRequest;
use App\Http\Resources\ChatResource;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            // 'chats' => ChatResource::collection(Chat::paginate(50))
            'chats' => ChatResource::collection(Chat::get())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChatRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;
        $chat = ChatResource::make(Chat::create($validated));

        broadcast(new ChatCreated($chat));

        return response()->json([
            'message' => 'Chat created successfully',
            'chat' => $chat
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        $chat->delete();

        $chat = ChatResource::make($chat);
        broadcast(new ChatDeleted($chat));

        return response()->json([
            'message' => 'Chat deleted successfully',
            'chat' => $chat
        ]);
    }
}
