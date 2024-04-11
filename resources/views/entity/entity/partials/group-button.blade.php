@php
    $menus = [
        [
            'route' => route('entities.show', $entity->id),
            'route_name' => 'entities.show',
            'name' => 'Profil',
        ],
        [
            'route' => route('entities.tree', $entity->id),
            'route_name' => 'entities.tree',
            'name' => 'Tree',
        ],
        [
            'route' => route('entities.chart', $entity->id),
            'route_name' => 'entities.chart',
            'name' => 'Chart',
        ],
    ];
@endphp
<x-group-button :menus="$menus" />