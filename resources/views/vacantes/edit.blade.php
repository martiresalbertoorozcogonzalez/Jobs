
@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css"
        integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css"
        integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA=="
        crossorigin="anonymous" />
@endsection()

@section('navegacion')
    @include('ext.adminnav')
@endsection()

@section('content')

   <h1 class="text-2lx text-center mt-10">Editar Vacante {{$vacante->titulo}}</h1>

   <form action="{{ route('vacantes.update',['vacante' => $vacante->id]) }}" method="POST" class="max-w-lg mx-auto my-10">

        @csrf
        @method('PUT')

        <div class="mb-5">
            <label for="titulo" class="block text-gray-700 text-sm mb-2">Titulo Vacante</label>

            <input
                id="titulo"
                type="text"
                class="p-3 bg-white rounded form-input w-full @error('titulo') border-blue-500 border @enderror"
                name="titulo"
                placeholder="Titulo vacante"
                value="{{$vacante->titulo}}"
                >
                @error('titulo')
                    <div class="bg-red-200 border border-red-500 text-red-800 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!!</strong>
                        <span class="block">{{$message}}</span>
                    </div>
                @enderror
        </div>

        <div class="mb-5">
            <label for="categoria" class="block text-gray-700 text-sm mb-2">
                Categoria;
            </label>
            <select id="categoria" class="block appearance-none border border-gray-200
                      text-gray-700 rounded leading-tight focus:outline-none
                      focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                      w-full" name="categoria">
                <option disabled selected> Selecciona </option>
                @foreach ($categorias as $categoria)
                    <option
                        {{ $vacante->categoria_id == $categoria->id ? 'selected' : ''}}
                        value="{{ $categoria->id }}">
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            @error('categoria')
                    <div class="bg-red-200 border border-red-500 text-red-800 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!!</strong>
                        <span class="block">{{$message}}</span>
                    </div>
            @enderror()
        </div>

        <div class="mb-5">
            <label for="experiencia" class="block text-gray-700 text-sm mb-2">
                experiencia;
            </label>
            <select id="experiencia" class="block appearance-none border border-gray-200
                      text-gray-700 rounded leading-tight focus:outline-none
                      focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                      w-full" name="experiencia">
                <option disabled selected> Selecciona </option>
                @foreach ($experiencias as $experiencia)
                    <option
                        {{ $vacante->experiencia_id == $experiencia->id ? 'selected' : ''}}
                        value="{{ $experiencia->id }}">
                        {{ $experiencia->nombre }}
                    </option>
                @endforeach
            </select>
            @error('experiencia')
                    <div class="bg-red-200 border border-red-500 text-red-800 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!!</strong>
                        <span class="block">{{$message}}</span>
                    </div>
            @enderror()
        </div>

        <div class="mb-5">
            <label for="ubicacion" class="block text-gray-700 text-sm mb-2">
                ubicacion;
            </label>
            <select id="ubicacion" class="block appearance-none border border-gray-200
                      text-gray-700 rounded leading-tight focus:outline-none
                      focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                      w-full" name="ubicacion">
                <option disabled selected> Selecciona </option>
                @foreach ($ubicaciones as $ubicacion)
                    <option
                        {{$vacante->ubicacion_id == $ubicacion->id ? 'selected' : ''}}
                        value="{{ $ubicacion->id }}">
                        {{ $ubicacion->nombre }}
                    </option>
                @endforeach
            </select>
            @error('ubicacion')
                    <div class="bg-red-200 border border-red-500 text-red-800 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!!</strong>
                        <span class="block">{{$message}}</span>
                    </div>
            @enderror()
        </div>

        <div class="mb-5">
            <label for="salario" class="block text-gray-700 text-sm mb-2">
                salario;
            </label>
            <select id="salario" class="block appearance-none border border-gray-200
                      text-gray-700 rounded leading-tight focus:outline-none
                      focus:bg-white focus:border-gray-500 p-3 bg-gray-100
                      w-full" name="salario">
                <option disabled selected> Selecciona </option>
                @foreach ($salarios as $salario)
                    <option
                        {{$vacante->salario_id == $salario->id ? 'selected' : ''}}
                        value="{{ $salario->id }}">
                        {{ $salario->nombre }}
                    </option>
                @endforeach
            </select>
            @error('salario')
                    <div class="bg-red-200 border border-red-500 text-red-800 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                        <strong class="font-bold">Error!!</strong>
                        <span class="block">{{$message}}</span>
                    </div>
            @enderror()
        </div>

        <div class="mb-5">
            <label for="descripcion" class="block text-gray-700 text-sm mb-2">
                Descripcion del Puesto
            </label>
            <div class="editable p-3 bg-gray-100 rounded form-input w-full text-gray-700"></div>
            <input type="hidden" name="descripcion" id="descripcion" value="{{$vacante->descripcion}}">
            @error('descripcion')
                <div class="bg-red-200 border border-red-500 text-red-800 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror()
        </div>

        <div class="mb-5">
            <label for="dropezoneJobs" class="block text-gray-700 text-sm mb-2">
                Imagen de la Vacante
            </label>
            <div id="dropzoneJobs" class="dropzone rounded bg-gray-100"></div>

            <input type="hidden" name="imagen" id="imagen" value="{{$vacante->imagen}}">
            @error('imagen')
                <div class="bg-red-200 border border-red-500 text-red-800 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror()
            <p id="error"></p>
        </div>

        <div class="mb-5">
            <label for="skills" class="block text-gray-700 text-sm mb-2">
                Habilidades y conocimietos: <span class="xs">[Elige al menos 3]</span>
            </label>

            @php
            $skills = ['HTML5','CSS3','CSSGrid','Flexbox','JavaScript','jQuery','Node','Angular','Vuejs','ReactJS','React
            Hooks','Redux','Apollo','GraphQL','TypeScript','PHP','Laravel','Symfony','Python','Django','ORM','Sequelize','Mongoose','SQL','MVC','SASS','WordPress','Express','Deno','React
            Native','Flutter','MobX','C#','Ruby on Rails']
            @endphp

            <lista-skills
              :skills="{{ json_encode($skills) }}"
              :oldskills="{{ json_encode($vacante->skills)}}"
            ></lista-skills>

            @error('skills')
                <div class="bg-red-200 border border-red-500 text-red-800 px-4 py-3 rounded relative mt-3 mb-6" role="alert">
                    <strong class="font-bold">Error!!</strong>
                    <span class="block">{{$message}}</span>
                </div>
            @enderror()

        </div>

        <button type="submit"
            class="bg-blue-500 w-full hover:bg-blue-600 text-gray-100 font-bold p-3 focus:outline focus:shadow-outline uppercase">
            Publicar Vacante
        </button>

    </form>

@endsection


@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js"
        integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"
        integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg=="
        crossorigin="anonymous"></script>
    <script>
        Dropzone.autoDiscover = false;

        document.addEventListener('DOMContentLoaded', () => {

            // Medium Editor
            const editor = new MediumEditor('.editable', {
                toolbar: {
                    buttons: ['bold', 'italic', 'underline', 'quote', 'anchor', 'justifyLeft',
                        'justifyCenter', 'justifyRight', 'justifyFull', 'orderedlist', 'unorderedlist',
                        'h2', 'h3'
                    ],
                    static: true,
                    sticky: true
                },
                placeholder: {
                    text: 'Informacion de la vacante'
                }
            });

            // Agrega al input hidden lo que el usuario escribe en medium editor
            editor.subscribe('editableInput', function(eventObj, editable) {
                const contenido = editor.getContent();
                document.querySelector('#descripcion').value = contenido;
            })

            //Llena el editor con el contenido del input
            editor.setContent( document.querySelector('#descripcion').value );

            //Dropzone
            const dropzoneJobs = new Dropzone('#dropzoneJobs', {
                url: "/vacantes/imagen",
                dictDefaultMessage: 'Sube aqui tu imagen',
                acceptedFiles: ".png , .jpg , .jpeg , .gif , .bmp",
                addRemoveLinks: true,
                dictRemoveFile: 'Borrar Archivo',
                maxFiles: 1,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function() {
                   if( document.querySelector('#imagen').value.trim()) {
                     let imagenPublicada = {};
                     imagenPublicada.size = 1234;
                     imagenPublicada.name = document.querySelector('#imagen').value;
                     imagenPublicada.nombreServidor = document.querySelector('#imagen').value;

                     this.options.addedfile.call(this, imagenPublicada);
                     this.options.thumbnail.call(this, imagenPublicada, `/storage/vacantes/${imagenPublicada.name}`);

                     imagenPublicada.previewElement.classList.add('dz-sucess');
                     imagenPublicada.previewElement.classList.add('dz-complete');
                   }
                },
                success: function(file, response) {
                    //console.log(file);
                    //console.log(response);
                    console.log(response.correcto);
                    document.querySelector('#error').textContent = '';

                    //Coloca la respuesta del servidor en el input hidden
                    document.querySelector('#imagen').value = response.correcto;

                    // Añadir al objeto de archivo el nombre del servidor
                    file.nombreServidor = response.correcto;
                },
                maxfilesexceeded: function(file) {
                    if (this.files[1] != null) {
                        this.removeFile(this.files[0]); //Elimina el archivo anterior
                        this.addFile(file); //Agregar el nuevo archivo
                    }
                },
                removedfile: function(file, response) {
                    file.previewElement.parentNode.removeChild(file.previewElement);
                    console.log('El archivo borrado fue', file);

                    params = {
                        imagen: file.nombreServidor
                    }

                    axios.post('/vacantes/borrarimagen', params)
                        .then(respuesta => console.log(respuesta))
                }
            });

        })

    </script>

@endsection()
