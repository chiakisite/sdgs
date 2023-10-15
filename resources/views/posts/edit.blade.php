<x-app-layout>
    <x-slot name="header">
        　みんなのSDGs
    </x-slot>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <textarea type='text' name='post[body]' value="{{ $post->body }}">{{ $post->body }}</textarea>
            </div>
            <div class="image">
                <input type="file" name="post[image]" value="{{ $post->image_url }}">
            </div>
            <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</x-app-layout>