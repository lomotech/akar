<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Models\Entity\Entity;

class EntityController extends Controller
{
    public function show(Entity $entity)
    {
        return view('entity.entity.show', compact('entity'));
    }

    public function tree(Entity $entity)
    {
        return view('entity.entity.tree', compact('entity'));
    }
}
