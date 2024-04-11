@props(['isFirst', 'isLast', 'menu'])

<a href="{{$menu['route']}}"
   @class([
         'relative',
         'inline-flex',
         'items-center',
         'px-3',
         'py-2',
         'text-sm',
         'font-semibold',
         'text-gray-900',
         'ring-1',
         'ring-inset',
         'ring-gray-300',
         'focus:z-10',
         '-ml-px' => !$isFirst,
         'rounded-l-md' => $isFirst,
         'rounded-r-md' => $isLast,
         'bg-white, hover:bg-gray-50' => ! Request::routeIs($menu['route_name']),
         'bg-yellow-400 hover:bg-yellow-500' => Request::routeIs($menu['route_name']),
    ])>
    {{$menu['name']}}
</a>