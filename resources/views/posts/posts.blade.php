<x-app-layout>
    <x-slot name="header">
        　みんなのSDGs
    </x-slot>
        <h1 class="title">
            {{ $post->title }}
        </h1>
        <div class="date">{{ $post->updated_at }}</div>
        <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <div>
             <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
         </div>
        <div class="content">
            <div class="content__post">
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="post-control">
        @if (!Auth::user()->is_bookmark($post->id))
        <form action="{{ route('bookmark.store', $post) }}" method="post">
            @csrf
            <button>お気に入り登録</button>
        </form>
        @else
        <form action="{{ route('bookmark.destroy', $post) }}" method="post">
            @csrf
            @method('delete')
            <button>お気に入り解除</button>
        </form>
        @endif
        </div>
        <li><a class="tab-item{{ Request::is('bookmarks') ? ' active' : ''}}" href="{{ route('bookmarks') }}">ブックマーク</a></li>
        @can('update', $post)
        <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
        @endcan
        <small>{{ $post->user->name }}</small>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
</x-app-layout>