@extends('layouts.app')

@section('navegacion')
    @include('ext.adminnav')
@endsection


@section('content')

 <div class="flex fle-col lg:flex-row shadow bg-white">
     <div class="lg:w-1/2 px-8 lg:px-12 py-12 lg:py-24">
        <p class="text-2xl text-gray-800">
            <span class="font-bold">Jobs</span>
        </p>
        <h1 class="mt-2 sm:mt-4 text-3xl font-bold text-gray-800 leading-tight">
          Encuentra el trabajo que buscas Remoto incluyendo varias regiones y tu pais
          <span class="text-teal-600 block">Desarrolladores / Diseñadores Web</span>
        </h1>
     </div>
     <div class="block lg:w-1/2">
       <img class ="inset-0 h-full w-full object-cover objet-center" src="{{asset('img/image1.jpg')}}" alt="Jobs">
     </div>
 </div>

 <div class="my-10 bg-white p-10 shadow">
     <h1 class="text-3xl text-gray-800 m-0">
         Nuevas
         <span class="font-bold">Vacantes</span>
     </h1>

     @include('ext.listadovacantes')

 </div>

@endsection
