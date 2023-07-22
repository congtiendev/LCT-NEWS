<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request)
    {
        if ($request->isMethod('post')) {
            dd($request->all());
        } else {
            return view('client.post.create');
        }
    }
}
