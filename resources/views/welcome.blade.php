<x-app-layout>

    {{-- Portada --}}
    
    <section class="bg-cover" style="background-image: url({{asset('img/home/woman-6396875_1920.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">Mi pagina de cursos - John Code</h1>
                <p class="text-white text-lg mt-2 mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, doloremque repellat? Maxime aliquam porro ipsam nobis adipisci asperiores labore odit expedita, quibusdam dolores veritatis pariatur tempore, iste natus mollitia nisi!</p>
                <!-- This is an example component -->
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
                    type="search" name="search" placeholder="Search">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
                        Search
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl">CONTENIDO</h1>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/cat-6463284_640.jpg')}}" alt="">
                </figure>

                <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Cursos proyectos</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta eligendi, saepe fugit recusandae ab impedit labore beatae itaque vel quisquam natus, aliquid dolore! Eius sed ducimus reprehenderit dolorum ad eveniet.</p>

            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/coffee-6464307_640.jpg')}}" alt="">
                </figure>

                 <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Manual de laravel</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta eligendi, saepe fugit recusandae ab impedit labore beatae itaque vel quisquam natus, aliquid dolore! Eius sed ducimus reprehenderit dolorum ad eveniet.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/fox-715588_640.jpg')}}" alt="">
                </figure>

                 <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Blog</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta eligendi, saepe fugit recusandae ab impedit labore beatae itaque vel quisquam natus, aliquid dolore! Eius sed ducimus reprehenderit dolorum ad eveniet.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/manarola-4840080_640.jpg')}}" alt="">
                </figure>

                 <header class="mt-2">
                    <h1 class="text-center text-xl text-gray-700">Desarrollo web</h1>
                </header>

                <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta eligendi, saepe fugit recusandae ab impedit labore beatae itaque vel quisquam natus, aliquid dolore! Eius sed ducimus reprehenderit dolorum ad eveniet.</p>
            </article>
        </div>
    </section>

    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-center text-3xl text-white">No sabes que curso llevar?</h1>
        <p class="text-white text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, explicabo hic maiores perferendis nesciunt nulla quo! Similique temporibus.</p>

        <div class="flex justify-center mt-4">
            <a href="{{ route('courses.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Catalogo de cursos
            </a>
        </div>
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ULTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Trabajo duro para subir subiendo cursos</p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach

        </div>
    </section>

</x-app-layout>
