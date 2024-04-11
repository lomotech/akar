<div class="max-w-7xl">
    <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Siblings</h3>
        <p class="border-gray-200 border"></p>
    </div>
    @forelse($entity->siblingSameParent()->get() as $sibling)
        <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <a class="text-blue-500 hover:text-blue-700"
               href="{{route('entities.show', $sibling->id)}}">
                {{$sibling->name}}
            </a>
        </div>
    @empty
    @endforelse
</div>