<div>

    <h2 class="text-2xl font-bold mt-4 ml-4">Estudiantes del curso</h2>'

    <x-table-responsive>
        <div class="px-6 pb-4">
            <input wire:model="search" class="form-input w-full flex-1 shadow-sm" type="text" placeholder="Ingrese el nombre de un estudiante">
        </div>
        {{$students}}
        @if ($students->count())
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Nombre
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Email
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($students as $student)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img id="picture" class="h-10 w-10 rounded-full object-cover object-center" src="{{$student->profile_photo_url}}" alt="">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            {{$student->name}}
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="text-sm text-gray-900">{{$student->email}}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                    </td>
                  </tr>
                @endforeach
  
              <!-- More people... -->
            </tbody>
        </table>

          <div class="py-4 px-6">
              {{$students->links()}}
          </div>
        @else
            <div class="px-6 py4">
                No hay ningun registro coincidente
            </div>
        @endif
    </x-table-responsive>
</div>
