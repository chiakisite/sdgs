<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store($postId) {
        $user = \Auth::user();
        if (!$user->is_bookmark($postId)) {
            $user->bookmark_posts()->attach($postId);
        }
        return back();
    }
    
    public function destroy($postId) {
        $user = \Auth::user();
        if ($user->is_bookmark($postId)) {
            $user->bookmark_posts()->detach($postId);
        }
        return back();
    }
    
        public function bookmark_posts()
    {
        $posts = \Auth::user()->bookmark_posts()->orderBy('created_at', 'desc')->paginate(10);
        $data = [
            'posts' => $posts,
        ];
        return view('posts.bookmarks', $data);
    }
}
