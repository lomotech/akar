<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Profil') }} : {{ $entity->name }}
            </h2>
            @include('entity.entity.partials.group-button')
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div id="wrapper">
                <span class="label">{{$entity->name}}</span>
                <div class="branch lv1">
                    @php
                        $children = $entity->gender_id == \App\Models\Zz\Categories::$GENDER_MALE ? 'childrenByFather' : 'childrenByMother';
                    @endphp
                    @foreach($entity[$children] as $child_lv1)
                        <div class="entry {{ $loop->count == 1 ? 'sole' : '' }}">
                            <a href="{{route('entities.tree', $child_lv1->id)}}">
                                <span class="label">{{$child_lv1->name}}</span>
                            </a>
                            @php
                                $children = $child_lv1->gender_id == \App\Models\Zz\Categories::$GENDER_MALE ? 'childrenByFather' : 'childrenByMother';
                                $child_lv2s = $child_lv1[$children];
                            @endphp
                            @if($child_lv2s->count() > 0)
                                <div class="branch lv2">
                                    @foreach($child_lv2s as $child_lv2)
                                        <div class="entry {{ $loop->count == 1 ? 'sole' : '' }}">
                                            <a href="{{route('entities.tree', $child_lv2->id)}}">
                                                <span class="label">{{$child_lv2->name}}</span>
                                            </a>
                                            @php
                                                $children = $child_lv2->gender_id == \App\Models\Zz\Categories::$GENDER_MALE ? 'childrenByFather' : 'childrenByMother';
                                                $child_lv3s = $child_lv2[$children];
                                            @endphp
                                            @if($child_lv3s->count() > 0)
                                                <div class="branch lv3">
                                                    @foreach($child_lv3s as $child_lv3)
                                                        <div class="entry {{ $loop->count == 1 ? 'sole' : '' }}">
                                                            <a href="{{route('entities.tree', $child_lv3->id)}}">
                                                                <span class="label">{{$child_lv3->name}}</span>
                                                            </a>
                                                            @php
                                                                $children = $child_lv3->gender_id == \App\Models\Zz\Categories::$GENDER_MALE ? 'childrenByFather' : 'childrenByMother';
                                                                $child_lv4s = $child_lv3[$children];
                                                            @endphp
                                                            @if($child_lv4s->count() > 0)
                                                                <div class="branch lv4">
                                                                    @foreach($child_lv4s as $child_lv4)
                                                                        <div class="entry {{ $loop->count == 1 ? 'sole' : '' }}">
                                                                            <a href="{{route('entities.tree', $child_lv4->id)}}">
                                                                                <span class="label">{{$child_lv4->name}}</span>
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>