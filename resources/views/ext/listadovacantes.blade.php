
     <ul class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach ($vacantes as $vacante)
        <li class="p-10 border border-gray-300 bg-white shadow">
            <h2 class="text-2xl font-bold text-gray-900">{{$vacante->titulo}}</h2>

            <p class="block text-gray-800 font-normal my-2">
                Categoria: {{$vacante->categoria->nombre}}
            </p>

            <p class="block text-gray-800 font-normal my-2">
               Ubicacion: <span>{{$vacante->ubicacion->nombre}}</span>
            </p>

            <p class="block text-gray-800 font-normal my-2">
                Experiencia: <span>{{$vacante->experiencia->nombre}}</span>
             </p>

             <a
                 class="bg-teal-600 text-gray-200 mt-2 px-4 py-2 inline-block rounded font-bold text-sm"
                 href="{{route('vacantes.show', ['vacante' => $vacante->id])}}">
                 Ver Vacante
             </a>

        </li>
        @endforeach
     </ul>
