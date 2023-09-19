<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

class CommentController extends Controller
{
    protected $comment;
    protected $post;
    protected $user;
    public function __construct(Comment $comment, Post $post, User $user)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    public function index()
    {
        $title = 'Quản lý bình luận';
        $comments = $this->comment->orderBy('created_at', 'desc')->paginate(10);
        foreach ($comments as $comment) {
            $user = User::find($comment->user_id);
            $post = $this->post->find($comment->post_id);
            $comment->post_slug = $post->slug;
            $comment->fullname = $user->fullname;
        }
        return view('admin.comment.index', compact('comments', 'title'));
    }

    public function deleteComment($id)
    {
        $comment = $this->comment->find($id);
        if ($comment) {
            $comment->delete();
            return redirect()->route('admin.comment.index')->with('success', 'Xóa bình luận thành công');
        }
        return redirect()->route('admin.comment.index')->with('error', 'Xóa bình luận thất bại');
    }
}
