<x-app-layout>
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 font-bold text-3xl">Detalle del pedido</h1>

        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover shadow" src="{{asset('storage/' . $course->image->url)}}">
                    <h2 class="text-lg ml-2">{{ $course->title}}</h2>
                    <p class="text-xl font-bold ml-auto">US$ {{ $course->price->value}}</p>
                </article>

                <div class="flex justify-end my-2">
                    <a href="{{ route('payment.pay', $course) }}" class="btn btn-primary">Comprar este curso</a>
                </div>

                <hr>

                <p class="text-sm mt-1">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto vero a illum error. Hic error adipisci optio amet odit. Eligendi repellat officia saepe laudantium quasi mollitia quidem optio, minima sit!
                    <a href="#" class="text-red-500 font-bold">Terminos y condiciones</a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>