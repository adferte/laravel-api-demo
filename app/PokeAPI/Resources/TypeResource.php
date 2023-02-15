<?php

namespace App\PokeAPI\Resources;

use App\Models\Type;
use Illuminate\Http\Resources\Json\JsonResource;

class TypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->{Type::ID},
            'name' => ucfirst($this->{Type::NAME}),
        ];
    }
}

