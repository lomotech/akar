@props(['menus'])

<div class="isolate inline-flex rounded-md shadow-sm">
    @foreach($menus as $menu)
        <x-group-button-single :isFirst="$loop->first" :isLast="$loop->last" :menu="$menu" />
    @endforeach
{{--    <a href="{{route('entities.show', $entity->id)}}" class="relative inline-flex items-center rounded-l-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">--}}
{{--        Profile--}}
{{--    </a>--}}
{{--    <a href="{{route('entities.tree', $entity->id)}}" class="relative -ml-px inline-flex items-center bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">--}}
{{--        Tree--}}
{{--    </a>--}}
{{--    <a href="{{route('entities.show', $entity->id)}}" class="relative -ml-px inline-flex items-center rounded-r-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-10">--}}
{{--        Chart--}}
{{--    </a>--}}
</div>