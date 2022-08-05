@if (count($photos) > 0)
    <ul class="list-unstyled">
        @foreach ($photos as $photo)
            <li class="media mb-3">
                <div>
                    {{-- 投稿内容 --}}
                    <p class="mb-0"><img src={{ $photo->url }}></p>
                </div>
                <div>
                    @if (Auth::id() == $photo->user_id)
                    {{-- 投稿削除ボタンのフォーム --}}
                        {!! Form::open(['route' => ['diaries.destroy', $photo->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $photos->links() }}
@endif