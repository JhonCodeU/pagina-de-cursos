<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                {{-- img src="{{Storage::url($course->image->url)}}" --}}
                <img class="h-60 w-full object-cover" src="{{asset('storage/' . $course->image->url)}}">
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->subtitle}}</h2>
                <p class="mb-2"><i class="fa fa-chart-line"></i> Nivel: {{$course->level->name}}</p>
                <p class="mb-2"><i class="fa fa-category"></i> Categoria: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fa fa-users"></i> Matriculados: {{$course->students_count}}</p>
                <p><i class="fa fa-star"></i> Calificacion: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2 text-gray-800">Lo que aprenderas</h1>

                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i> {{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2 text-gray-800">Temario</h1>

                @foreach ($course->sections as $section)
                    <article class="mb-4 shadow" @if ($loop->first) x-data="{open: true}" @else x-data="{open: false}" @endif>
                        <header class="border border-gray-200 px-4 px-2 cursor-pointer bg-gray-200" x-on:click="open = !open">
                            <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
                        </header>

                        <div class="bg-white py-2 px-4" x-show="open">
                            <ul class="grid grid-cols-1 gap-2">
                                @foreach ($section->lessons as $lesson)
                                    <li class="text-gray-700 text-base"><i class="fas fa-play-circle mr-2 text-gray-600"></i>{{$lesson->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
            </section>

            <section lass="mb-8">
                <h1 class="font-bold text-3xl text-gray-800">Requisitos</h1>

                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @endforeach
                </ul>
            </section>

            <section>
                <h1 class="font-bold text-3xl text-gray-800">Description</h1>
                <div class="text-gray-700 text-base">
                    {!!$course->description!!}
                </div>
            </section>

            @livewire('course-reviews', ['course' => $course])
        </div>

        <div class="order-1 lg:order-2">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-fold text-gray-500 text-lg">Prof. {{$course->teacher->name}}</h1>
                            <a class="text-blue-400 text-sm font-bold" href="">{{'@' . Str::slug($course->teacher->name, '')}}</a>
                        </div>
                    </div>

                    @can('enrolled', $course)
                        <a class="btn btn-danger btn-block mt-4" href="{{ route('courses.status', $course) }}">Continuar con el curso</a>
                    @else

                    @if ($course->price->value == 0)
                        <p class="text-2xl font-bold text-gray-400 mt-2">FREE</p>

                        <form action="{{ route('courses.enrolled', $course) }}" method="post">
                            @csrf
                            <button class="btn btn-danger btn-block mt-4" type="submit">llevar este curso</button>
                        </form>
                    @endif
                        <p class="text-2xl font-bold text-gray-400 mt-2">US$ {{$course->price->value}}</p>

                        <a href="{{ route('payment.checkout', $course) }}" class="btn btn-danger btn-block mt-4">Comprar esta curso</a>
                    @endcan

                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6">
                        <img class="w-40 h-32 object-cover" src="{{asset('storage/' . $similar->image->url)}}" alt="">
                        <div class="ml-3">
                            <h1 class="text-gray-700">
                                <a class="font-bold text-gray-500 mb-3" href="{{route('courses.show',$similar)}}">{{Str::limit($similar->title, 40)}}</a>
                            </h1>

                            <div class="flex items-center">
                                <img class="h-10 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="{{$similar->teacher->name}}">
                                <p class="text-gray-700 text-sm ml-2">{{$similar->teacher->name}}</p>
                            </div>

                            <p class="text-sm mt-5"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}}</p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>

    </div>
</x-app-layout>