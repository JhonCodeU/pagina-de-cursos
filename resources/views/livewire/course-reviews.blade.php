<section class="mt-4">
    <h1 class="font-bold text-3xl text-gray-800 mb-2">Valoracion</h1>

    @can('enrolled', $course)
        <article class="mb-4">

            @can('valued', $course)
                <textarea wire:model="comment" class="form-input w-full" rows="3" placeholder="Ingrese una resena del curso"></textarea>

                <div class="flex">
                    <button class="btn btn-primary mr-2" wire:click="store">Guardar</button>

                    <ul class="flex items-center">
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 1)"><i class="fa fa-star text-{{$rating >= 1 ? 'yellow' : 'grey'}}-300"></i></li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 2)"><i class="fa fa-star text-{{$rating >= 2 ? 'yellow' : 'grey'}}-300"></i></li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 3)"><i class="fa fa-star text-{{$rating >= 3 ? 'yellow' : 'grey'}}-300"></i></li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 4)"><i class="fa fa-star text-{{$rating >= 4 ? 'yellow' : 'grey'}}-300"></i></li>
                        <li class="mr-1 cursor-pointer" wire:click="$set('rating', 5)"><i class="fa fa-star text-{{$rating >= 5 ? 'yellow' : 'grey'}}-300"></i></li>
                    </ul>
                </div>
            @else
                <div class="px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
                    <p>Usted ya califico este curso</p>
                </div>
            @endcan

        </article>
    @endcan

    <div class="card mt-2">
        <div class="card-body">
            <p class="text-gray-800 text-xl">{{$course->reviews->count()}} Valoraciones</p>

            @foreach ($course->reviews as $review)
                <article class="flex mb-4">
                    <figure class="mr-4">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$review->user->profile_photo_url}}" alt="">
                    </figure>

                    <div class="card flex-1">
                        <div class="card-body bg-gray-100">
                            <p><b>{{$review->user->name}}</b> <i class="fa fa-star text-yellow-300"></i>({{$review->rating}})</p>

                            {{$review->comment}}
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section class="mt-4">
