<x-app-layout>
    @push('styles')
        <style>
            .linage {
                fill: none;
                stroke: #000;
            }
            .marriage {
                fill: none;
                stroke: black;
            }
            .man {
                background-color: #cde3ea;
                border: 1px solid lightblue;
                box-sizing: border-box;
                border-radius: 6px;
                padding: 4px;
            }
            .woman {
                background-color: #f5dde1;
                border: 1px solid pink;
                box-sizing: border-box;
                border-radius: 6px;
                padding: 4px;
            }
            .emphasis{
                font-style: italic;
            }
            p {
                padding:0;
                margin:0;
            }
            svg {
                border-style: solid;
                border-width: 1px;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="https://d3js.org/d3.v4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/lodash/4.17.4/lodash.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/d3-dtree/dist/dTree.min.js"></script>

        <script defer>
            treeData = {!! $tree !!}
            treeData2 = [{
                "name": "Niclas Superlongsurname",
                "class": "man",
                "textClass": "emphasis",
                "marriages": [{
                    "spouse": {
                        "name": "Iliana",
                        "class": "woman",
                        "extra": {
                            "nickname": "Illi"
                        }
                    },
                    "children": [{
                        "name": "James",
                        "class": "man",
                        "marriages": [{
                            "spouse": {
                                "name": "Alexandra",
                                "class": "woman"
                            },
                            "children": [{
                                "name": "Eric",
                                "class": "man",
                                "marriages": [{
                                    "spouse": {
                                        "name": "Eva",
                                        "class": "woman"
                                    }
                                }]
                            }, {
                                "name": "Jane",
                                "class": "woman",
                                "marriages": [{
                                    "spouse": {
                                        "name": "Alexandra",
                                        "class": "woman"
                                    },
                                    "children": [{
                                        "name": "Eric",
                                        "class": "man",
                                        "marriages": [{
                                            "spouse": {
                                                "name": "Eva",
                                                "class": "woman"
                                            }
                                        }]
                                    }, {
                                        "name": "Jane",
                                        "class": "woman"
                                    }, {
                                        "name": "Jasper",
                                        "class": "man",
                                        "marriages": [{
                                            "spouse": {
                                                "name": "Alexandra",
                                                "class": "woman"
                                            },
                                            "children": [{
                                                "name": "Eric",
                                                "class": "man",
                                                "marriages": [{
                                                    "spouse": {
                                                        "name": "Eva",
                                                        "class": "woman"
                                                    }
                                                }]
                                            }, {
                                                "name": "Jane",
                                                "class": "woman"
                                            }, {
                                                "name": "Jasper",
                                                "class": "man"
                                            }, {
                                                "name": "Emma",
                                                "class": "woman"
                                            }, {
                                                "name": "Julia",
                                                "class": "woman"
                                            }, {
                                                "name": "Jessica",
                                                "class": "woman"
                                            }]
                                        }]
                                    }, {
                                        "name": "Emma",
                                        "class": "woman"
                                    }, {
                                        "name": "Julia",
                                        "class": "woman"
                                    }, {
                                        "name": "Jessica",
                                        "class": "woman"
                                    }]
                                }]
                            }, {
                                "name": "Jasper",
                                "class": "man"
                            }, {
                                "name": "Emma",
                                "class": "woman"
                            }, {
                                "name": "Julia",
                                "class": "woman"
                            }, {
                                "name": "Jessica",
                                "class": "woman"
                            }]
                        }]
                    }]
                }]
            }]

            dTree.init(treeData, {
                target: "#graph",
                debug: true,
                height: 800,
                width: 1200,
                callbacks: {
                    nodeClick: function(name, extra) {
                        console.log(name);
                    },
                    textRenderer: function(name, extra, textClass) {
                        // THis callback is optinal but can be used to customize
                        // how the text is rendered without having to rewrite the entire node
                        // from screatch.
                        if (extra && extra.nickname)
                            name = name + " (" + extra.nickname + ")";
                        return "<p align='center' class='" + textClass + "'>" + name + "</p>";
                    },
                    nodeRenderer: function(name, x, y, height, width, extra, id, nodeClass, textClass, textRenderer) {
                        // This callback is optional but can be used to customize the
                        // node element using HTML.
                        let node = '';
                        node += '<div ';
                        node += 'style="height:100%;width:100%;" ';
                        node += 'class="' + nodeClass + '" ';
                        node += 'id="node' + id + '">\n';
                        node += textRenderer(name, extra, textClass);
                        node += '</div>';
                        return node;
                    }
                }
            });

        </script>
    @endpush
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
            <div id="graph"></div>
        </div>
    </div>
</x-app-layout>