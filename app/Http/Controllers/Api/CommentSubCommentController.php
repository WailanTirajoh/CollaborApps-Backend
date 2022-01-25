<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\PostCommentResource;
use App\Models\Comment;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CommentSubCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Comment $comment)
    {
        return response()->json([
            'message' => 'Get all comment success',
            'comments' => PostCommentResource::collection($comment->comments()->orderBy('created_at')->get()),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request, Comment $comment)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::user()->id;

        $comment = $comment->comments()->save(new Comment($validated));

        return response()->json([
            'message' => 'Comment added successfully',
            'comment' => PostCommentResource::make($comment),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment, Comment $subComment)
    {
        $subComment->update($request->validated());

        return response()->json([
            'message' => 'Comment updated successfully',
            'comment' => PostCommentResource::make($subComment)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment, Comment $subComment)
    {
        if ($subComment->comments()->count() > 0) {
            return response()->json([
                'message' => 'Comment cannot be deleted, someone comment at this already'
            ], Response::HTTP_FORBIDDEN);
        }
        $subComment->delete();

        return response()->json([
            'message' => 'Comment deleted successfully!',
            'comment' => PostCommentResource::make($subComment),
        ]);
    }
}
