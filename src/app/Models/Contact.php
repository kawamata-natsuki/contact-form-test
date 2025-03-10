<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory;

    # 論理削除機能
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    # マスアサイメントの設定
    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail'
    ];

    # リレーションの定義
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // ------------ 検索機能 ---------------- //

    # 名前またはメールアドレスで検索
    public function scopeSearch(Builder $query, $search)
    {
        if (!empty($search)) {
            return $query->where(function ($q) use ($search) {
                $q->where('last_name', 'LIKE', "%{$search}%")
                    ->orWhere('first_name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }
        return $query;
    }

    # 性別で検索
    public function scopeGender(Builder $query, $gender)
    {
        if (!empty($gender)) {
            return $query->where('gender', $gender);
        }
        return $query;
    }

    # お問い合わせの種類で検索
    public function scopeContentSearch(Builder $query, $category_id)
    {
        if (!empty($category_id)) {
            return $query->where('category_id', $category_id);
        }
        return $query;
    }


    # 作成日で検索
    public function scopeDate(Builder $query, $date)
    {
        if (!empty($date)) {
            return $query->whereDate('created_at', $date);
        }
        return $query;
    }
}
