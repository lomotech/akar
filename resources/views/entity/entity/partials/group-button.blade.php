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
            'route' => route('entities.d3-tree', $entity->id),
            'route_name' => 'entities.d3-tree',
            'name' => 'D3 Tree',
        ],
    ];
@endphp
<x-group-button :menus="$menus" />