@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('users.navtabs')
            @if (Auth::id() == $user->id)
                {{-- 日記投稿フォーム --}}
                @include('diaries.form')
            @endif
            {{-- 投稿一覧 --}}
            @include('diaries.diaries')
        </div>
    </div>
@endsection