<?php

namespace App\Http\Controllers\Entity;

use App\Http\Controllers\Controller;
use App\Models\Entity\Couple;
use App\Models\Entity\Entity;
use App\Models\Zz\Categories;

class EntityController extends Controller
{
    protected array $tree;

    public function show(Entity $entity)
    {
        return view('entity.entity.show', compact('entity'));
    }

    public function tree(Entity $entity)
    {
        return view('entity.entity.tree', compact('entity'));
    }

    public function d3Tree(Entity $entity)
    {
        // main
        $this->tree = [
            [
                'name'  => $entity->name,
                'class' => $entity->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
            ],
        ];

        //        $this->d3TreeSpouses($entity, [0]);

        // spouses
        $spouses    = Couple::spouse($entity->id, $entity->gender_id)->get();
        $spousesTag = $entity->gender_id == Categories::$GENDER_MALE ? 'wife' : 'husband';

        if ($spouses->isNotEmpty()) {
            foreach ($spouses as $index1 => $spouse) {
                $this->tree[0]['marriages'][$index1] = [
                    'spouse' => [
                        'name'  => $spouse[$spousesTag]?->name,
                        'class' => $spouse[$spousesTag]->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
                    ],
                ];

                // children
                $childrenlv1 = Entity::query()
                    ->where('father_id', $spouse->husband_id)
                    ->where('mother_id', $spouse->wife_id)
                    ->get();

                foreach ($childrenlv1 as $index2 => $childlv1) {
                    $this->tree[0]['marriages'][$index1]['children'][$index2] = [
                        'name'  => $childlv1->name,
                        'class' => $childlv1->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
                    ];

                    // spouses lv2
                    $spouseslv2 = Couple::spouse($childlv1->id, $childlv1->gender_id)->get();

                    if ($spouseslv2->isNotEmpty()) {
                        $spouseslv2Tag = $childlv1->gender_id == Categories::$GENDER_MALE ? 'wife' : 'husband';

                        foreach ($spouseslv2 as $index3 => $spouselv2) {
                            if (! isset($this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'])) {
                                $this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'] = [];
                            }

                            $this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3] = [
                                'spouse' => [
                                    'name'  => $spouselv2[$spouseslv2Tag]?->name,
                                    'class' => $spouselv2[$spouseslv2Tag]->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
                                ],
                            ];

                            // children
                            $childrenlv2 = Entity::query()
                                ->where('father_id', $spouselv2->husband_id)
                                ->where('mother_id', $spouselv2->wife_id)
                                ->get();

                            foreach ($childrenlv2 as $index4 => $childlv2) {
                                $this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3]['children'][$index4] = [
                                    'name'  => $childlv2->name,
                                    'class' => $childlv2->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
                                ];

                                // spouses lv3
                                $spouseslv3 = Couple::spouse($childlv2->id, $childlv2->gender_id)->get();

                                if ($spouseslv3->isNotEmpty()) {
                                    $spouseslv3Tag = $childlv2->gender_id == Categories::$GENDER_MALE ? 'wife' : 'husband';

                                    foreach ($spouseslv3 as $index5 => $spouselv3) {
                                        if (isset($this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3]['children'][$index4]['marriages'])) {
                                            $this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3]['children'][$index4]['marriages'] = [];
                                        }

                                        $this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3]['children'][$index4]['marriages'][$index5] = [
                                            'spouse' => [
                                                'name'  => $spouselv3[$spouseslv3Tag]?->name,
                                                'class' => $spouselv3[$spouseslv3Tag]->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
                                            ],
                                        ];

                                        // children
                                        $childrenlv3 = Entity::query()
                                            ->where('father_id', $spouselv3->husband_id)
                                            ->where('mother_id', $spouselv3->wife_id)
                                            ->get();

                                        foreach ($childrenlv3 as $index6 => $childlv3) {
                                            $this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3]['children'][$index4]['marriages'][$index5]['children'][$index6] = [
                                                'name'  => $childlv3->name,
                                                'class' => $childlv3->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
                                            ];

                                            // spouses lv4
                                            $spouseslv4 = Couple::spouse($childlv3->id, $childlv3->gender_id)->get();

                                            if ($spouseslv4->isNotEmpty()) {
                                                $spouseslv4Tag = $childlv3->gender_id == Categories::$GENDER_MALE ? 'wife' : 'husband';

                                                foreach ($spouseslv4 as $index7 => $spouselv4) {
                                                    if (isset($this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3]['children'][$index4]['marriages'][$index5]['children'][$index6]['marriages'])) {
                                                        $this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3]['children'][$index4]['marriages'][$index5]['children'][$index6]['marriages'] = [];
                                                    }

                                                    $this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3]['children'][$index4]['marriages'][$index5]['children'][$index6]['marriages'][$index7] = [
                                                        'spouse' => [
                                                            'name'  => $spouselv4[$spouseslv4Tag]?->name,
                                                            'class' => $spouselv4[$spouseslv4Tag]->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
                                                        ],
                                                    ];

                                                    // children
                                                    $childrenlv4 = Entity::query()
                                                        ->where('father_id', $spouselv4->husband_id)
                                                        ->where('mother_id', $spouselv4->wife_id)
                                                        ->get();

                                                    foreach ($childrenlv4 as $index8 => $childlv4) {
                                                        $this->tree[0]['marriages'][$index1]['children'][$index2]['marriages'][$index3]['children'][$index4]['marriages'][$index5]['children'][$index6]['marriages'][$index7]['children'][$index8] = [
                                                            'name'  => $childlv4->name,
                                                            'class' => $childlv4->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
                                                        ];
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        dump($this->tree);

        $tree = json_encode($this->tree);

        return view('entity.entity.d3-tree', compact('entity', 'tree'));
    }

    protected function d3TreeSpouses($entity, $levels = [0])
    {
        $spouses    = Couple::spouse($entity->id, $entity->gender_id)->get();
        $spousesTag = $entity->gender_id == Categories::$GENDER_MALE ? 'wife' : 'husband';

        if ($spouses->isNotEmpty()) {
            foreach ($spouses as $index1 => $spouse) {
                if (isset($this->tree[0]['marriages'])) {
                    $this->tree[0]['marriages'] = [];
                }

                $this->tree[0]['marriages'][$index1] = [
                    'spouse' => [
                        'name'  => $spouse[$spousesTag]?->name,
                        'class' => $spouse->gender_id == Categories::$GENDER_MALE ? 'man' : 'woman',
                    ],
                ];
            }
        }
    }
}
