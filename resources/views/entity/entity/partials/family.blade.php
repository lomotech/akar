<div class="max-w-7xl">
    <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Family</h3>
        <p class="">
            <a href="{{route('entities.tree', $entity->id)}}">show tree</a>
        </p>
    </div>
    <dl class="divide-y divide-gray-100">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Father</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                <a class="text-blue-500 hover:text-blue-700"
                   href="{{route('entities.show', $entity->father_id ?? '')}}">
                    {{$entity->father?->name}}
                </a>
            </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Mother</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                <a class="text-blue-500 hover:text-blue-700"
                   href="{{route('entities.show', $entity->mother_id ?? '')}}">
                {{$entity->mother?->name}}
                </a>
            </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Spouse</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                <ol>
                    @php
                        $spouses = $entity->gender_id == \App\Models\Zz\Categories::$GENDER_MALE ? 'wife' : 'husband';
                    @endphp
                    @foreach(\App\Models\Entity\Couple::spouse($entity->id, $entity->gender_id)->get() as $spouse)
                        <li>
                            <a class="text-blue-500 hover:text-blue-700"
                               href="{{route('entities.show', $spouse[$spouses]?->id)}}">
                                {{$spouse[$spouses]?->name}}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </dd>
        </div>
    </dl>
</div>