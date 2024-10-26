<?php

namespace App\Models;

use App\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    use Translatable;

    protected $fillable = [
        'name',
        'name_kk',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post', 'category_id', 'post_id');
    }
}
