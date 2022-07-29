@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
             <h1>Keep your Diary with "AsIs."</h1>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
        <div class="text-center">
            <h2>Not "To be", But "As is".<br>It's your real diary, "AsIs."></h2>
        </div>
    </div>
@endsection