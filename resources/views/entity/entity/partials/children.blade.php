<div class="max-w-7xl">
    <div class="px-4 sm:px-0">
        <div class="flex justify-between">
            <h3 class="text-base font-semibold leading-7 text-gray-900">Children</h3>
            <a class="text-blue-500 hover:text-blue-700"
               href="{{route('entities.show', [$entity->id ?? '', 'a' => 'createChildren'])}}">
                add
            </a>
        </div>
        <p class="border-gray-200 border"></p>
    </div>
    @if(request('a') == 'createChildren')
        <div class="w-2/3 mt-4">
            {{ html()->modelForm($entity, 'PUT', route('entities.links.update', $entity->id))->open() }}
            {{ html()->select('child_id', \App\Models\Entity\Entity::maleList(), $entity->father_id ?? null)->placeholder('--- Select One ---')->class('mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
            {{ html()->submit('Update')->class('py-2 text-blue-500 hover:text-blue-700') }}
            {{ html()->form()->close() }}

            {{ html()->modelForm($entity, 'POST', route('entities.links.store', $entity->id))->open() }}
            {{ html()->input('text', 'child_name')->class('block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
            {{ html()->select('child_gender_id', \App\Models\Zz\Categories::genderList(), $entity->child_gender_id ?? null)->placeholder('--- Select One ---')->class('mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
            {{ html()->submit('Save')->addClass('py-2 text-blue-500 hover:text-blue-700') }}
            {{ html()->form()->close() }}
        </div>
        <a class="text-blue-500 hover:text-blue-700"
           href="{{route('entities.show', [$entity->id ?? ''])}}">
            cancel
        </a>
    @endif
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