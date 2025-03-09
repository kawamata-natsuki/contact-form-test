<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    # マスアサイメントの設定
    protected $fillable = ['content'];

    # リレーションの定義
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'category_id', 'id');
    }
}
