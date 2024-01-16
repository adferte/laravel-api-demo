<?php

namespace Src\ApiContext\Domain\Model\Pokemon;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Src\ApiContext\Domain\Model\Type\Type;
use Src\ApiContext\Domain\Traits\HasUuid;

class Pokemon extends Model
{
    use HasUuid;

    const ID = 'id';
    const POKEDEX_NUMBER = 'pokedex_number';
    const NAME = 'name';
    const IMAGE = 'image';

    const TABLE = 'pokemons';

    protected $fillable = [
        self::POKEDEX_NUMBER,
        self::NAME,
        self::IMAGE,
    ];

    protected $table = self::TABLE;

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class)->withTimestamps();
    }
}
