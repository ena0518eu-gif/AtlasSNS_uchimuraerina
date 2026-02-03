<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /* 追記 保存可能カラム指定 */

    protected $fillable = [
        'user_id',
        'post'
    ];

    /**
     * 投稿を所有するユーザーを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
