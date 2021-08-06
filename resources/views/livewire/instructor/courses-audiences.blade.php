<section>
    <h2 class="text-2xl font-bold mt-4 ml-4">Audiencia del curso</h2>
    <hr class="mt-2 mb-6">

    @foreach ($course->audiences as $item)
        
    <article class="card mb-4">
        <div class="card-body bg-gray-100">
            
            @if ($audience->id == $item->id)
                <form wire:submit.prevent="update">
                    <input type="text" wire:model="audience.name" class="form-input w-full">

                    @error('audience.name')
                        <span class="text-red-500 text-xs"></span>
                    @enderror
                </form>
            @else
                <header class="flex justify-between">
                    <h2>{{ $item->name }}</h2>

                    <div>
                        <i wire:click="edit({{$item}})" class="fa fa-edit text-blue-500 cursor-pointer"></i>
                        <i wire:click="delete({{$item}})" class="fa fa-trash text-red-500 cursor-pointer ml-2"></i>
                    </div>
                </header>
            @endif
        </div>
    </article>
    @endforeach

    <article class="card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <input wire:model="name" type="text" class="form-input w-full" placeholder="Agregue el nombre de la meta">

                @error('name')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror

                <div class="flex justify-end mt-2">
                    <button type="submit" class="btn btn-primary text-sm">Agregar Audiencia</button>
                </div>
            </form>
        </div>
    </article>
</section>
