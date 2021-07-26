<x-app-layout>

    {{-- Portada --}}

    <section class="bg-cover" style="background-image: url({{asset('img/courses/work-731198_1920.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-fold text-4xl">Los mejores cursos de programacion</h1>
                <p class="text-white text-lg mt-2 mb-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Similique, doloremque repellat? Maxime aliquam porro ipsam nobis adipisci asperiores labore odit expedita, quibusdam dolores veritatis pariatur tempore, iste natus mollitia nisi!</p>
                <!-- This is an example component -->
                <div class="pt-2 relative mx-auto text-gray-600">
                    @livewire('search')
                </div>
            </div>
        </div>
    </section>

    @livewire('courses-index')

</x-app-layout>