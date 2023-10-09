<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Bookmark;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Cloudinary; 

class PostController extends Controller
{
    
    public function show(Post $post)
    {
        return view('posts.posts')->with(['post' => $post]);
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function index(Request $request)
    {  
        $keyword = $request->input('keyword');

        $query = Post::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('body', 'LIKE', "%{$keyword}%");
        }

        $posts = $query->orderBy('updated_at','desc')->paginate(5);
        
        return view('posts.index', compact('posts', 'keyword'));
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function create(Post $post,Category $category)
    {
        return view('posts.create')->with(['post' => $post,'categories' => $category->get()]);
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function edit(Post $post)
    {
        $this->authorize($post);
        return view('posts.edit')->with(['post' => $post]);
       //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    
    public function store(Request $request, Post $post)
    {
        $input = $request['post'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $input += ['image_url' => $image_url]; 
        $input += ['user_id' => $request->user()->id]; 
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize($post);
        $input_post = $request['post'];
        $input_post += ['user_id' => $request->user()->id];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
        
    }
    
     public function delete( Post $post)
    {
    $this->authorize($post);
     $post->delete();
     return redirect('/');
        
    }
    

    
    
    
}
?>