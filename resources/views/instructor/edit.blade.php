<x-instructor-layout :course="$course">
    
    <div class="card-body text-gray-600">
        <h1 class="text-2xl font-bold">Informacion del curso</h1>
        <hr class="mt-2 mb-6">
        {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}
        
            @include('instructor.partials.form')

            <div class="flex justify-end">
                {!! Form::submit('Actualizar informacion', ['class' => 'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/course/form.js')}}"></script>
    </x-slot>
</x-instructor-layout>