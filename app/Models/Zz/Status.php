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
class Status extends Model
{
    use SoftDeletes;

    public $table = 'zz_statuses';

    public static int $MARTIAL = 1;
    public static int $MARTIAL_UNMARRIED = 2;
    public static int $MARTIAL_MARRIED = 3;
    public static int $MARTIAL_DIVORCED = 4;
    public static int $MARTIAL_DIVORCED_DEAD = 5;

    public static int $OCCUPATION = 6;
    public static int $OCCUPATION_WORKING = 7;
    public static int $OCCUPATION_SELF_WORKING = 8;
    public static int $OCCUPATION_UNEMPLOYED = 9;

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
        return $this->belongsTo(Status::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Status::class, 'parent_id');
    }
}
