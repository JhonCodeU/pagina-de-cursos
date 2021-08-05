<div>
    <div class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">

            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Recursos de la leccion</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->resource)
                    <div class="flex justify-between items-center">
                        <p><i class="fas fa-download text-gray-500 mr-2 cursor-pointer" wire:click="download"></i>{{$lesson->resource->url}}</p>
                        <i wire:click="destroy" class="fa fa-trash text-red-500 cursor-pointer"></i>
                    </div>
                @else
                    <form wire:submit.prevent="save">
                        <div class="form-group flex item-center">
                            <input wire:model="file" type="file" class="form-input flex-1">
                            <button type="submit" class="btn btn-primary text-sm ml-2">Guardar</button>
                        </div>

                        <div class="text-blue-500 font-bold" wire:loading wire:target="file">
                            Cargando...
                        </div>

                        @error('file')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
