<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'subdomain_id',
        'name',
        'code',
    ];

    public $timestamps = false;

    public function subdomain():BelongsTo
    {
        return $this->belongsTo(Subdomain::class);
    }
}

