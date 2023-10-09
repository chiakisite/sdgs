<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;
use Cloudinary; 


class UserController extends Controller
{
    public function index(User $user,Post $post)
{
    return view('User.index')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
}
}
