<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Type extends Model
{
    use HasUuid;

    const ID = 'id';
    const NAME = 'name';

    protected $fillable = [
        self::NAME,
    ];

    protected $table = 'types';

    public function pokemon(): BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class)->withTimestamps();
    }
}
