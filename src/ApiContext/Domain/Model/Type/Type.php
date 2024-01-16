<?php

namespace Src\ApiContext\Domain\Model\Type;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\ApiContext\Domain\Model\Pokemon\Pokemon;
use Src\ApiContext\Domain\Traits\HasUuid;

class Type extends Model
{
    use HasUuid;

    const ID = 'id';
    const NAME = 'name';

    const TABLE = 'types';

    protected $fillable = [
        self::NAME,
    ];

    protected $table = self::TABLE;

    public function pokemon(): BelongsToMany
    {
        return $this->belongsToMany(Pokemon::class)->withTimestamps();
    }
}
