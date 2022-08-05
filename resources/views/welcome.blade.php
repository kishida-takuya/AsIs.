@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 日記投稿フォーム --}}
                @include('diaries.form')
                {{-- 投稿一覧 --}}
                @include('diaries.diaries')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Keep your diary with "AsIs."</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
            <div class="text-center">
                <h2><br>Not "To be", But "As is".<br>It's your real diary, "AsIs".</h2>
            </div>
        </div>
    @endif
@endsection