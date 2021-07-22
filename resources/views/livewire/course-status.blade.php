<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">

            <div class="embed-responsive">
                {!!$current->iframe!!}
            </div>

            <h1 class="text-3xl text-gray-600 font-bold mt-4">
                {{$current->name}}                
            </h1>

            @if ($current->Description)
                <div class="text-gray-600">
                    {{$current->Description->name}}
                </div>
            @endif

            <div class="flex items-center mt-4 cursor-pointer" wire:click="completed">
                @if ($current->completed)
                    <i class="fa fa-toggle-on text-2xl text-blue-600"></i>
                @else
                    <i class="fa fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar esta unidad como terminada</p>
            </div>

            <div class="card mt-2">
                <div class="card-body flex text-gray-500 font-bold">
                   
                    @if ($this->previous)
                        <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer">Previous</a>
                    @endif

                    @if ($this->next)
                        <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Next</a>
                    @endif
                </div>
            </div>
        
        </div>

        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl leading-8 text-center mb-4">{{$course->title}}</h1>
                
                <div class="flex items-center">
                    <figure>
                        <img class="w-12 h-12 object-cover rounded-full shadow mr-4" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                    </figure>

                    <div>
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500 text-sm">{{Str::slug('@' . $course->teacher->name, '')}}</a>
                    </div>
                </div>

                <p class="text-sm text-gray-600 text-sm mt-2">{{$this->advance . '%'}} completed</p>

                <div class="relative pt-1">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                      <div style="width:{{$this->advance . '%'}}" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"></div>
                    </div>
                </div>

                <ul>
                    @foreach ($course->sections as $section)
                        <li class="text-gray-600 mb-4">
                            <a class="font-bold text-base mb-2 inline-block">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li class="flex">
                                        <div>
                                            @if ($lesson->completed)
                                                @if ($current->id == $lesson->id)
                                                    <span class="block w-4 h-4 border-2 border-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="block w-4 h-4 bg-yellow-300 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @else
                                                @if ($current->id == $lesson->id)
                                                    <span class="block w-4 h-4 border-2 border-gray-500 rounded-full mr-2 mt-1"></span>
                                                @else
                                                    <span class="block w-4 h-4 bg-gray-500 rounded-full mr-2 mt-1"></span>
                                                @endif
                                            @endif
                                        </div>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
