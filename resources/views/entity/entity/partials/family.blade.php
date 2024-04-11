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
                        <div class="w-2/3">
                            {{ html()->modelForm($entity, 'PUT', route('entities.links.update', $entity->id))->open() }}
                            {{ html()->select('father_id', \App\Models\Entity\Entity::maleList(), $entity->father_id ?? null)->placeholder('--- Select One ---')->class('mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
                            {{ html()->submit('Update')->class('py-2 text-blue-500 hover:text-blue-700') }}
                            {{ html()->form()->close() }}

                            {{ html()->modelForm($entity, 'POST', route('entities.links.store', $entity->id))->open() }}
                            {{ html()->input('text', 'father_name')->class('block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
                            {{ html()->submit('Save')->addClass('py-2 text-blue-500 hover:text-blue-700') }}
                            {{ html()->form()->close() }}
                        </div>
                        <a class="text-blue-500 hover:text-blue-700"
                           href="{{route('entities.show', [$entity->id ?? ''])}}">
                            cancel
                        </a>
                    @else
                        <a class="text-blue-500 hover:text-blue-700 w-2/3"
                           href="{{route('entities.show', $entity->father_id ?? '')}}">
                            {{$entity->father?->name}}
                        </a>
                        <a class="text-blue-500 hover:text-blue-700"
                           href="{{route('entities.show', [$entity->id ?? '', 'a' => 'editFather'])}}">
                            edit
                        </a>
                    @endif
                </div>
            </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Mother</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                <div class="flex justify-between">
                    @if(request('a') == 'editMother')
                        <div class="w-2/3">
                            {{ html()->modelForm($entity, 'PUT', route('entities.links.update', $entity->id))->open() }}
                            {{ html()->select('mother_id', \App\Models\Entity\Entity::femaleList(), $entity->mother_id ?? null)->placeholder('--- Select One ---')->class('mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
                            {{ html()->submit('Update')->class('py-2 text-blue-500 hover:text-blue-700') }}
                            {{ html()->form()->close() }}

                            {{ html()->modelForm($entity, 'POST', route('entities.links.store', $entity->id))->open() }}
                            {{ html()->input('text', 'mother_name')->class('block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
                            {{ html()->submit('Save')->addClass('py-2 text-blue-500 hover:text-blue-700') }}
                            {{ html()->form()->close() }}
                        </div>
                        <a class="text-blue-500 hover:text-blue-700"
                           href="{{route('entities.show', [$entity->id ?? ''])}}">
                            cancel
                        </a>
                    @else
                        <a class="text-blue-500 hover:text-blue-700 w-2/3"
                           href="{{route('entities.show', $entity->mother_id ?? '')}}">
                            {{$entity->mother?->name}}
                        </a>
                        <a class="text-blue-500 hover:text-blue-700"
                           href="{{route('entities.show', [$entity->id ?? '', 'a' => 'editMother'])}}">
                            edit
                        </a>
                    @endif
                </div>
            </dd>
        </div>
        <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="font-medium leading-6 text-gray-900">Spouse</dt>
            <dd class="mt-1 leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                <ol>
                    @php
                        $spousesTag = $entity->gender_id == \App\Models\Zz\Categories::$GENDER_MALE ? 'wife' : 'husband';
                        $lists = $entity->gender_id == \App\Models\Zz\Categories::$GENDER_MALE
                            ? \App\Models\Entity\Entity::femaleList()
                            : \App\Models\Entity\Entity::maleList();
                        $spouses = \App\Models\Entity\Couple::spouse($entity->id, $entity->gender_id)->get();
                    @endphp
                    @if($spouses->isEmpty())
                        <div class="flex justify-between">
                            @if(request('a') == 'editSpouse')
                                <div class="w-2/3">
                                    {{ html()->modelForm($entity, 'PUT', route('entities.links.update', $entity->id))->open() }}
                                    {{ html()->select('spouse_id', $lists, $entity->spouse_id ?? null)->placeholder('--- Select One ---')->class('mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
                                    {{ html()->submit('Update')->class('py-2 text-blue-500 hover:text-blue-700') }}
                                    {{ html()->form()->close() }}

                                    {{ html()->modelForm($entity, 'POST', route('entities.links.store', $entity->id))->open() }}
                                    {{ html()->input('text', 'spouse_name')->class('block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
                                    {{ html()->submit('Save')->addClass('py-2 text-blue-500 hover:text-blue-700') }}
                                    {{ html()->form()->close() }}
                                </div>
                                <a class="text-blue-500 hover:text-blue-700"
                                   href="{{route('entities.show', [$entity->id ?? ''])}}">
                                    cancel
                                </a>
                            @else
                                <span></span>
                                <a class="text-blue-500 hover:text-blue-700"
                                   href="{{route('entities.show', [$entity->id ?? '', 'a' => 'editSpouse'])}}">
                                    edit
                                </a>
                            @endif
                        </div>
                    @endif
                    @foreach($spouses as $spouse)
                        <li>
                            <div class="flex justify-between">
                                @if(request('a') == 'editSpouse')
                                    <div class="w-2/3">
                                        {{ html()->modelForm($entity, 'PUT', route('entities.links.update', $entity->id))->open() }}
                                        {{ html()->select('spouse_id', \App\Models\Entity\Entity::femaleList(), $entity->spouse_id ?? null)->placeholder('--- Select One ---')->class('mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
                                        {{ html()->submit('Update')->class('py-2 text-blue-500 hover:text-blue-700') }}
                                        {{ html()->form()->close() }}

                                        {{ html()->modelForm($entity, 'POST', route('entities.links.store', $entity->id))->open() }}
                                        {{ html()->input('text', 'spouse_name')->class('block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6') }}
                                        {{ html()->submit('Save')->addClass('py-2 text-blue-500 hover:text-blue-700') }}
                                        {{ html()->form()->close() }}
                                    </div>
                                    <a class="text-blue-500 hover:text-blue-700"
                                       href="{{route('entities.show', [$entity->id ?? ''])}}">
                                        cancel
                                    </a>
                                @else
                                    <a class="text-blue-500 hover:text-blue-700 w-2/3"
                                       href="{{route('entities.show', $spouse[$spousesTag]?->id)}}">
                                        {{$spouse[$spousesTag]?->name}}
                                    </a>
                                    <a class="text-blue-500 hover:text-blue-700"
                                       href="{{route('entities.show', [$entity->id ?? '', 'a' => 'editSpouse'])}}">
                                        edit
                                    </a>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ol>
            </dd>
        </div>
    </dl>
</div>