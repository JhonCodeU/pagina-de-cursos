<div>
    @foreach ($section->lessons as $item)
        
        <div class="card mt-4" x-data="{open: false}">
            <div class="card-body">
               
                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">
                        <div class="flex item-center">
                            <label for="nombre" class="w-32">NOMBRE:</label>
                            <input wire:model="lesson.name" type="text" name="nombre" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex item-center mt-4">
                            <label for="platform" class="w-32">Plataforma: </label>

                            <select name="platform"  wire:model="lesson.platform_id"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex item-center mt-2">
                            <label for="url" class="w-32">URL:</label>
                            <input wire:model="lesson.url" type="text" name="url" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        @error('lesson.url')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type="button" class="btn btn-primary mr-2" wire:click="cancel">Cancelar</button>
                            <button type="submit" class="btn btn-danger">Actualizar</button>
                        </div>
                    </form>
                @else
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i> Leccion: {{$item->name}}</h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2">
                        <p class="text-sm">Platafoma: {{$item->platform_id}}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>

                        <div class="my-2">
                            <button class="btn btn-primary text-sm" wire:click="edit({{$item}})">Editar</button>
                            <button class="btn btn-danger text-sm" wire:click="destroy({{$item}})">Eliminar</button>
                        </div>
                    </div>

                    <div class="mb-4">
                        @livewire('instructor.lesson-description', ['lesson' => $item], key($item->id))
                    </div>

                    <div>
                        @livewire('instructor.lesson-resources', ['lesson' => $item], key($item->id))
                    </div>
                @endif
            </div>
        </div>

    @endforeach

    <div class="mt-4" x-data="{open: false}">
        <div class="ml-2 mb-2 ">
            <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                <i class="fa fa-plus-square text-2xl text-red-500 mr-2"></i>
                Agregar nueva leccion
            </a>
        </div>

        <div class="card" x-show="open">
            <div class="card-body">
                <h2 class="text-xl font-bold mb-4">Agregar nueva leccion</h2>

                <div>
                    <div class="flex item-center">
                        <label for="nombre" class="w-32">NOMBRE:</label>
                        <input wire:model="name" type="text" name="nombre" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex item-center mt-4">
                        <label for="platform" class="w-32">Plataforma: </label>

                        <select name="platform"  wire:model="platform_id"  class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @foreach ($platforms as $platform)
                                <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    @error('platform')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror

                    <div class="flex item-center mt-2">
                        <label for="url" class="w-32">URL:</label>
                        <input wire:model="url" type="text" name="url" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    @error('url')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end mt-3">
                    <button class="btn btn-danger mr-2" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary" wire:click="store">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
