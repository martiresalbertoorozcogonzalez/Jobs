<aside class="md:w-3/5 bg-teal-500 p-5 rounded m-3">
    <h2 class="text-2xl my-5 text-white uppercase font-bold text-center">contacta al reclutador</h2>

    <form action="{{route('candidatos.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
           <label for="nombre" class="block text-white text-sm font-bold mb-4">
               Nombre:
           </label>
           <input
           id="nombre"
           type="text"
           class="p-3 b-gray-200 rounded form-input w-full @error('nombre') border border-red-500 @enderror"
           name="nombre"
           placeholder="Tu Nombre"
           value="{{old('nombre')}}"
           >

           @error('nombre')
               <div class="bg-red-200 border-l-4 border-red-600 text-red-500 p-4 w-full mt-5" role="alert">
                  <p>{{$message}}</p>
               </div>
           @enderror

       </div>

       <div class="mb-4">
           <label for="email" class="block text-white text-sm font-bold mb-4">
               Email:
           </label>
           <input
           id="email"
           type="text"
           class="p-3 b-gray-200 rounded form-input w-full @error('email') border border-red-500 @enderror"
           name="email"
           placeholder="Tu Email"
           value="{{old('email')}}"
           >

           @error('email')
               <div class="bg-red-200 border-l-4 border-red-600 text-red-500 p-4 w-full mt-5" role="alert">
                  <p>{{$message}}</p>
               </div>
           @enderror

       </div>

       <div class="mb-4">
           <label for="cv" class="block text-white text-sm font-bold mb-4">
               Curriculum (PDF):
           </label>
           <input
           id="cv"
           type="file"
           class="p-3  rounded form-input w-full @error('cv') border border-red-500 @enderror"
           name="cv"
           accept="application/pdf"
           >

           @error('cv')
               <div class="bg-red-200 border-l-4 border-red-600 text-red-500 p-4 w-full mt-5" role="alert">
                  <p>{{$message}}</p>
               </div>
           @enderror

       </div>

       <input type="hidden" name="vacante_id" value="{{$vacante->id}}">

       <input
         type="submit"
         class="bg-teal-700 w-full hover:bg-teal-800 text-gray-200 p-3 focus:outline-none focus:shadow-outline uppercase"
         value="Enviar Mensaje"
       >

    </form>

   </aside>
