<x-app-layout>
    <x-slot name="header">
        　みんなのSDGs
    </x-slot>
        <h1>ブックマークした記事</h1>
        <div>
        <div class='posts'>
            @foreach ($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <div class="date">{{ $post->updated_at }}</div>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                </div>
                <p class='body'>{{ $post->body }}</p>
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                 @csrf
                @method('DELETE')
                <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
            </div>
            <small>{{ $post->user->name }}</small>
            <div class="article-control">
            @if (!Auth::user()->is_bookmark($post->id))
           <form action="/posts/{{$post->id}}/bookmark" method='post'>
                @csrf
                <button>お気に入り登録</button>
            </form>
            @else
            <form action="/posts/{{$post->id}}/unbookmark" method='post'>
                @csrf
                @method('delete')
                <button>お気に入り解除</button>
            </form>
            @endif
            </div>
            @endforeach
        </div>
        <li><a class="tab-item{{ Request::is('bookmarks') ? ' active' : ''}}" href="{{ route('bookmarks') }}">ブックマーク</a></li>
        <a href='/posts/create'>create</a>
        
</x-app-layout>
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
