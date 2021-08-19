<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subdomain extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'subdomain',
    ];

    public function moderator(): HasMany
    {
        return $this->hasMany(Moderator::class);
    }

    public function category():HasMany
    {
        return $this->hasMany(Category::class);
    }
}

