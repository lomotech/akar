<div class="max-w-7xl">
    <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Family</h3>
        <p class="border-gray-200 border"></p>
    </div>
    <dl class="divide-y divide-gray-100">
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Father</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                <div class="flex justify-between">
                    @if(request('a') == 'editFather')
                        <form action="{{route('entities.update', $entity->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="father_id" value="">
                            <input type="text" name="father_name" value="{{$entity->father?->name}}">
                            <button type="submit">Save</button>
                        </form>
                    @else
                        <a class="text-blue-500 hover:text-blue-700"
                           href="{{route('entities.show', $entity->father_id ?? '')}}">
                            {{$entity->father?->name}}
                        </a>
                    @endif
                    <a class="text-blue-500 hover:text-blue-700"
                       href="{{route('entities.show', [$entity->id ?? '', 'a' => 'editFather'])}}">
                        edit
                    </a>
                </div>
            </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Mother</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                <div class="flex justify-between">
                    <a class="text-blue-500 hover:text-blue-700"
                       href="{{route('entities.show', $entity->mother_id ?? '')}}">
                        {{$entity->mother?->name}}
                    </a>
                    <a class="text-blue-500 hover:text-blue-700"
                       href="{{route('entities.show', [$entity->id ?? '', 'a' => 'editMother'])}}">
                        edit
                    </a>
                </div>
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
                            <div class="flex justify-between">
                                <a class="text-blue-500 hover:text-blue-700"
                                   href="{{route('entities.show', $spouse[$spouses]?->id)}}">
                                    {{$spouse[$spouses]?->name}}
                                </a>
                                <a class="text-blue-500 hover:text-blue-700"
                                   href="{{route('entities.show', [$entity->id ?? '', 'a' => 'editSpouse'])}}">
                                    edit
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </dd>
        </div>
    </dl>
</div>