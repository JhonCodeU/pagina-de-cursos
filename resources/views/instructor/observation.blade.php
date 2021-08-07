<x-instructor-layout :course="$course">

        <h1 class="text-2xl font-bold mt-4 ml-4">Observaciones del curso</h1>
        <hr class="mt-2 mb-6">

        <div class="text-gray-500 ml-4">
            {!!$course->observation->body!!}
        </div>
</x-instructor-layout>