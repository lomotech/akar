<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Models\Entity\Couple;
use App\Models\Entity\Entity;
use App\Models\Zz\Categories;

class EntityLinkController extends Controller
{
    public function update(Entity $entity)
    {
        switch (true) {
            case request()->has('mother_id'):
                $entity->mother_id = request('mother_id');
                $entity->save();
                break;
            case request()->has('father_id'):
                $entity->father_id = request('father_id');
                $entity->save();
                break;
            case request()->has('spouse_id'):
                $husbandId = $entity->gender_id == Categories::$GENDER_MALE
                    ? $entity->id
                    : request('spouse_id');
                $wifeId = $entity->gender_id == Categories::$GENDER_FEMALE
                    ? $entity->id
                    : request('spouse_id');
                $this->createSpouseLink($husbandId, $wifeId);
                break;
        }

        return redirect(route('entities.show', $entity->id));
    }

    public function store(Entity $entity)
    {
        switch (true) {
            case request()->has('mother_name'):
                $link = $this->createMotherData();

                $entity->mother_id = $link->id;
                $entity->save();
                break;
            case request()->has('father_name'):
                $link = $this->createFatherData();

                $entity->father_id = $link->id;
                $entity->save();
                break;
            case request()->has('spouse_name'):
                $link = $this->createSpouseData($entity->gender_id);

                $husbandId = $entity->gender_id == Categories::$GENDER_MALE
                    ? $entity->id
                    : $link->id;
                $wifeId = $entity->gender_id == Categories::$GENDER_FEMALE
                    ? $entity->id
                    : $link->id;
                $this->createSpouseLink($husbandId, $wifeId);
                break;
        }

        return redirect(route('entities.show', $entity->id));
    }

    protected function createFatherData()
    {
        return Entity::create([
            'name'      => request('father_name'),
            'gender_id' => Categories::$GENDER_MALE,
        ]);
    }

    protected function createMotherData()
    {
        return Entity::create([
            'name'      => request('mother_name'),
            'gender_id' => Categories::$GENDER_FEMALE,
        ]);
    }

    protected function createSpouseData($entityGenderId)
    {
        return Entity::create([
            'name'      => request('mother_name'),
            'gender_id' => $entityGenderId == Categories::$GENDER_MALE
                ? Categories::$GENDER_FEMALE
                : Categories::$GENDER_MALE,
        ]);
    }

    protected function createSpouseLink($husbandId, $wifeId)
    {
        Couple::updateOrCreate([
            'husband_id' => $husbandId,
            'wife_id'    => $wifeId,
        ]);
    }
}
