<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h2 x-on:click="open = !open" class="text-xl text-gray-500 cursor-pointer">Descripcion de la leccion</h2>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        <textarea wire:model="description.name" name="name" class="form-input w-full"></textarea>

                        @error('description.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="destroy" type="button" class="btn btn-danger text-sm mr-2">Eliminar</button>
                            <button type="submit" class="btn btn-primary text-sm">Actualizar</button>
                        </div>
                    </form>
                @else
                    <div>
                        <textarea wire:model="name" name="name" class="form-input w-full" placeholder="Agregue una descripcion"></textarea>

                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="store" class="btn btn-primary text-sm">Agregar</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
