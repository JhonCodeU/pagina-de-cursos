<x-app-layout>
    <div class="container py-8">
        <div class="card">
            <div class="card-body">
                <h2 class="text-2xl font-bold">Crear nuevo curso</h2>
                <hr class="text-gray-600 mt-2 mb-6">

                {!! Form::open(['route' => 'instructor.courses.store', 'files' => true, 'autocomplete' => 'off']) !!}
                    @include('instructor.partials.form')

                    {!! Form::hidden('user_id', auth()->user()->id) !!}

                    <div class="flex justify-end">
                        {!! Form::submit('Crear nuevo curso', ['class' => 'btn btn-primary cursor-pointer']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
        <script src="{{ asset('js/instructor/course/form.js')}}"></script>
    </x-slot>
</x-app-layout>