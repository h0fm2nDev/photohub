<?php

namespace App\Http\Controllers;

use App\Ad;
use App\User;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Ad $ad)
    {
        if ($request->validated()) {

            $comment = new Comment;
            $comment->title = $request->title;
            $comment->content = $request->content;
            $comment->ad_id = $ad->id;
            $comment->user_id = auth()->user()->id;
            $comment->save();

            return response()->json($comment, 200);

        } else {

            return response()->json([
                'status' => 'error',
                'errors' => $request->errors()
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return response()->json([
            'status' => 'Item has been removed', 200
        ]);
    }
}
