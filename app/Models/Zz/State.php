<?php

namespace App\Models\Zz;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class State
 *
 * @property string $name
 * @property string $fullname
 * @property string $ddsa_code
 */
class State extends Model
{
    use SoftDeletes;

    public $table = 'zz_states';

    protected $guarded = [];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name'      => 'string',
        'fullname'  => 'string',
        'ddsa_code' => 'string',
    ];
}
