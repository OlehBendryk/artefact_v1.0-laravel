<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_id',
        'category_id',
        'moderator_id',
        'title',
        'post_raw',
        'post_html',
        'is_active',
        'is_top',
    ];

    public $timestamps = false;

    public function subdomain()
    {
        return $this->belongsTo(Subdomain::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function moderator()
    {
        return $this->belongsTo(Moderator::class);
    }
}

