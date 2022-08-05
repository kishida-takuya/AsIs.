<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = ['content'];

    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function photo()
    {
        //return $this->belongsTo(Photo::class);diary_id
        return Photo::where('diary_id', $this->id)->first();
    }
}
