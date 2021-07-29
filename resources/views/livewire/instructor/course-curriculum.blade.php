<div>
    <x-slot name="course">
        {{$course->slug}}
    </x-slot>

    <h2 class="text-2xl font-bold text-gray-500 ml-5 mt-4">Lecciones del curso</h2>
    <hr class="mt-2 mb-6">


    @foreach ($course->sections as $item)
        <article class="card mb-6">
            <div class="card-body bg-gray-100">

                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" type="text" class="form-control w-full" placeholder="ingrese el nombre de la section">
                    </form>

                    @error('section.name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                @else
                    <header class="flex justify-between items-center">
                        <h1 class="cursor-pointer"><strong>Section: </strong>{{$item->name}}</h1>

                        <div>
                            <i class="fa fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item}})"></i>
                            <i class="fa fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>
                @endif
                
            </div>
        </article>
    @endforeach

    <div x-data="{open: false}">
        <div class="ml-2 mb-2 ">
            <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                <i class="fa fa-plus-square text-2xl text-red-500 mr-2"></i>
                Agregar nueva seccion
            </a>
        </div>

        <div class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h2 class="text-xl font-bold mb-4">Agregar nueva seccion</h2>

                <div>
                    <input type="text" wire:model="name" class="form-input w-full" placeholder="Escriba el nombre de la seccion">
                    @error('name')
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
