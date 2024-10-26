<?php

namespace App\Models;

use App\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = ['name', 'image', 'description','name_kk', 'description_kk',];

    use Translatable;

    public function categories()
    {
        // Используем belongsToMany для связи "многие ко многим" с моделью Category
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'category_id');
    }


}
