@if (isset($favorites))
    <ul class="list-none">
        @foreach ($favorites as $favorite)
            <li class="flex items-center gap-x-2 mb-4">
                {{-- お気に入りした投稿所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <div class="avatar">
                    <div class="w-12 rounded">
                        <img src="{{ Gravatar::get($favorite->user->email) }}" alt="" />
                    </div>
                </div>
                <div>
                    <div>
                        {{-- お気に入りした投稿所有者のユーザ詳細ページへのリンク --}}
                        <a class="link link-hover text-info" href="{{ route('users.show', $favorite->user->id) }}">{{ $favorite->user->name }}</a>
                        <span class="text-muted text-gray-500">posted at {{ $favorite->created_at }}</span>
                    </div>
                    <div>
                        {{-- お気に入りにした投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $favorites->links() }}
@endif