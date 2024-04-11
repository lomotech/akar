<?php

namespace App\Models\Entity;

use App\Models\Zz\Categories;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 *
 * @property string $name
 */
class Couple extends Model
{
    use HasUlids, SoftDeletes;

    public $table = 'entity_couples';

    protected $guarded = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];

    public function scopeSpouse($query, $id, $gender)
    {
        return $query->where($gender == Categories::$GENDER_MALE ? 'husband_id' : 'wife_id', $id);
    }

    public function husband(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'husband_id');
    }

    public function wife(): BelongsTo
    {
        return $this->belongsTo(Entity::class, 'wife_id');
    }
}
