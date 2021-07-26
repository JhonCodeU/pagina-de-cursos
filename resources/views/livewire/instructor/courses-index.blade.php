<div class="container">

    <x-table-responsive>
        <div class="px-6 py-4">
            <input wire:model="search" wire:keydown="clearPage" class="form-input w-full shadow-sm" type="text" placeholder="Ingrese el nombre de un curso">
        </div>

        @if ($courses->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Matriculados
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Calificacion
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($courses as $course)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" src="{{asset('storage/'. $course->image->url)}}" alt="">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{$course->title}}
                          </div>
                          <div class="text-sm text-gray-500">
                            {{$course->category->name}}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$course->students_count}}</div>
                      <div class="text-sm text-gray-500">Alumnos matriculados</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900 flex items-center">
                            {{$course->rating}}
                            <ul class="flex text-sm ml-2">
                                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 1 ? 'yellow' : 'grey'}}-400"></i></li>
                                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 2 ? 'yellow' : 'grey'}}-400"></i></li>
                                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 3 ? 'yellow' : 'grey'}}-400"></i></li>
                                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 4 ? 'yellow' : 'grey'}}-400"></i></li>
                                <li class="mr-1"><i class="fa fa-star text-{{$course->rating >= 5 ? 'yellow' : 'grey'}}-400"></i></li>
                            </ul>
                        </div>
                        <div class="text-sm text-gray-500">Valoracion del curso</div>
                      </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @switch($course->status)
                        @case(1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                Borrador
                            </span>
                            @break
                        @case(2)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                Revision
                            </span>
                            @break
                        @case(3)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Publicado
                            </span>
                        @break
                        @default
                            
                    @endswitch

                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                  </tr>
                @endforeach
  
              <!-- More people... -->
            </tbody>
        </table>

          <div class="py-4 px-6">
              {{$courses->links()}}
          </div>
        @else
            <div class="px-6 py4">
                No hay ningun registro coincidente
            </div>
        @endif
    </x-table-responsive>

</div>
