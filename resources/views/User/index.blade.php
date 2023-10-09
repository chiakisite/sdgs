    <x-app-layout>
    <x-slot name="header">
        　みんなのSDGs
    </x-slot>
        <div class="own_posts">
        @foreach($own_posts as $post)
            <div>
                <h4><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h4>
                <div class="date">{{ $post->updated_at }}</div>
                 <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。"/>
                </div>
                <small>{{ $post->user->name }}</small>
                <p>{{ $post->body }}</p>
            </div>
            @endforeach
        <div class='paginate'>
            {{ $own_posts->links() }}
        </div>
        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
        </form>
    </div>
    </x-app-layout>
    <script>
    function deletePost(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
</script>
