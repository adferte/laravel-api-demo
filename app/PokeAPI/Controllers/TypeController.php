<?php

namespace App\PokeAPI\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\PokeAPI\Resources\TypeResource;

class TypeController extends Controller
{
    public function get()
    {
        return TypeResource::collection(Type::all());
    }
}
