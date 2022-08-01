@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
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