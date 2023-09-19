<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    protected $comment;
    public function __construct()
    {
        $this->comment = new Comment();
    }

    public function newComment(CommentRequest $request)
    {
        $data = $request->all();
        $comment =  $this->comment->create($data);
        if ($comment) {
            $newComment = Comment::where('comments.id', $comment->id)
                ->join('users', 'comments.user_id', '=', 'users.id')
                ->select('comments.*', 'users.id as user_id', 'comments.created_at as comment_date', 'comments.id as comment_id', 'users.fullname as fullname', 'users.avatar as avatar')
                ->first();
            return response()->json([
                'status' => 200,
                'message' => 'Thêm mới thành công',
                'response' => $newComment
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Thêm mới thất bại',
                'data' => null
            ]);
        }
    }
}
