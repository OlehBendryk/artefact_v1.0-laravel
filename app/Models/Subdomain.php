<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Subdomain
 *
 * @property int $id
 * @property string $name
 * @property string $subdomain
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Moderator[] $moderator
 * @property-read int|null $moderator_count
 * @method static \Illuminate\Database\Eloquent\Builder|Subdomain newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subdomain newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Subdomain query()
 * @method static \Illuminate\Database\Eloquent\Builder|Subdomain whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdomain whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdomain whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdomain whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdomain whereSubdomain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Subdomain whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

