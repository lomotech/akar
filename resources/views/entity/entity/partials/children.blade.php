<div class="max-w-7xl">
    <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Children</h3>
        <p class="border-gray-200 border"></p>
    </div>
    @php
        $children = $entity->gender_id == \App\Models\Zz\Categories::$GENDER_MALE ? 'childrenByFather' : 'childrenByMother';
    @endphp
    @foreach($entity[$children] as $child)
        <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <a class="text-blue-500 hover:text-blue-700"
               href="{{route('entities.show', $child->id)}}">
                {{$child->name}}
            </a>
        </div>
    @endforeach
</div>