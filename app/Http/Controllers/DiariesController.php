<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DiariesController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            // （後のChapterで他ユーザの投稿も取得するように変更しますが、現時点ではこのユーザの投稿のみ取得します）
            $diaries = $user->feed_diaries()->orderBy('created_at', 'desc')->paginate(10);
            
            $photos = $user->photos()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'photos' => $photos,
                'diaries' => $diaries,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
            'myfile' => 'required',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $diary = $request->user()->diaries()->create([
            'content' => $request->content,
        ]);


        $this->validate($request, ['myfile' => 'required|image']);

        $image = $request->file('myfile');

        /**
         * 自動生成されたファイル名が付与されてS3に保存される。
         * 第三引数に'public'を付与しないと外部からアクセスできないので注意。
         */
        $path = Storage::disk('s3')->putFile('photos', $image, 'public');
        
        /* ファイルパスから参照するURLを生成する */
        $url = Storage::disk('s3')->url($path);
        
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->photos()->create([
            'url' => $url, 'diary_id' => $diary->id
        ]);
        
        
        
        return redirect()->back()->with('url', $url);
    }
    
     public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $diary = \App\Diary::findOrFail($id);
        $photo = \App\Photo::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $diary->user_id) {
            $diary->delete();
            $photo->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
