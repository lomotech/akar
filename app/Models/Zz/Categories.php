<?php

namespace App\Models\Zz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 *
 * @property string $name
 */
class Categories extends Model
{
    use SoftDeletes;

    public static int $GENDER = 1;
    public static int $GENDER_MALE = 2;
    public static int $GENDER_FEMALE = 3;
    public static int $GENDER_BOTH = 4;

    public $table = 'zz_categories';

    protected $guarded = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Categories::class, 'parent_id');
    }

    public static function genderList(): array
    {
        return self::query()
            ->where('parent_id', Categories::$GENDER)
            ->orderBy('name')
            ->pluck('name', 'id')
            ->toArray();
    }
}
