<?php

namespace App\Models\Entity;

use App\Models\Zz\Categories;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 *
 * @property string $name
 */
class Entity extends Model
{
    use HasUlids, SoftDeletes;

    public $table = 'entities';

    protected $guarded = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];

    public function gender(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }

    public static function maleList(): array
    {
        return self::query()
            ->where('gender_id', Categories::$GENDER_MALE)
            ->orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }

    public static function femaleList(): array
    {
        return self::query()
            ->where('gender_id', Categories::$GENDER_FEMALE)
            ->orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }

    public function father(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'father_id');
    }

    public function mother(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'mother_id');
    }

    public function childrenByFather(): HasMany
    {
        return $this->hasMany(Entity::class, 'father_id');
    }

    public function childrenByMother(): HasMany
    {
        return $this->hasMany(Entity::class, 'mother_id');
    }

    public function scopeSiblingSameParent($query)
    {
        return $query
            ->whereNotNull('father_id')
            ->whereNotNull('mother_id')
            ->where('father_id', $this->father_id)
            ->where('mother_id', $this->mother_id)
            ->where('id', '<>', $this->id);
    }
}
