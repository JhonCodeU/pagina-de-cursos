@props(['course'])

<article class="card flex flex-col">
    <img class="img-responsive h-36 w-full object-cover" src="{{asset('storage/' . $course->image->url)}}" alt="img">

    {{-- Corre en local host --}}
    {{-- {{Storage::url($course->image->url)}} --}}

    <div class="card-body flex-1 flex flex-col">
        <h1 class="card-title">{{Str::limit($course->title, 40)}}</h1>
        <p class="text-gray-500 mb-2 mt-auto">Prof: {{$course->teacher->name}}</p>

        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 1 ? 'yellow' : 'grey'}}-400"></i></li>
                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 2 ? 'yellow' : 'grey'}}-400"></i></li>
                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 3 ? 'yellow' : 'grey'}}-400"></i></li>
                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 4 ? 'yellow' : 'grey'}}-400"></i></li>
                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 5 ? 'yellow' : 'grey'}}-400"></i></li>
            </ul>

            <p class="text-sm text-gray-500 ml-auto">
                <i class="fa fa-user"></i>
                {{$course->students_count}}
            </p>

        </div>

        @if ($course->price->value == 0)
            <p class="my-2 text-green-700 mr-auto font-bold">FREE</p>
        @else
            <p class="my-2 text-gray-500 mr-auto font-bold">US$ {{$course->price->value}}</p>
        @endif

        <a href="{{route('courses.show', $course)}}" class="btn btn-block btn-primary"">
            More information
        </a>
    </div>
</article>