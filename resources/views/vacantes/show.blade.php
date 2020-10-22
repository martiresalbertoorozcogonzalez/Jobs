@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" />
@endsection

@section('content')
    
<h1 class="text-3xl text-center mt-10">{{$vacante->titulo}}</h1>

<div class="mt-10 mb-20 md:flex items-start">
  
    <div class="md:w-3/5">
      <p class="block text-gray-700 font-bold my-2">
         Publicado: <span class="font-normal">{{ $vacante->created_at->diffForHumans() }}</span>
         <p class="block text-gray-700 font-bold my-2">
             Por: <span class="font-normal">{{ $vacante->reclutador->name }}</span>
         </p>        
      </p>
      <p class="block text-gray-700 font-bold my-2">
         Categoria: <span class="font-normal">{{$vacante->categoria->nombre}}</span>
      </p>
      <p class="block text-gray-700 font-bold my-2">
         Salario: <span class="font-normal">{{$vacante->salario->nombre}}</span>
      </p>
      <p class="block text-gray-700 font-bold my-2">
         Ubicacion: <span class="font-normal">{{$vacante->ubicacion->nombre}}</span>
      </p>
      <p class="block text-gray-700 font-bold my-2">
         Experiencia: <span class="font-normal">{{$vacante->experiencia->nombre}}</span>
      </p>

      <h2 class="text-2l text-center mt-10 text-gray-800 mb-5">
          Conocimientos y Tecnologias
      </h2>
      
      @php
          $arraySkills = explode(",", $vacante->skills)
      @endphp

      @foreach ($arraySkills as $skill)
      <p class="inline-block border border-gray-600 rounded py-2 px-8 text-gray-700 my-2">
          {{$skill}}
        </p>
      @endforeach

      <a href="/storage/vacantes/{{ $vacante->imagen }}" data-lightbox="imagen" data-title="Vacante {{ $vacante->titulo }}">
       <img src="/storage/vacantes/{{ $vacante->imagen }}" class="w-40 mt-10" alt="">
      </a>

      <div class="descripcion mt-10 mb-5">
          {!! $vacante->descripcion !!}
      </div>

    </div>
    
    @include('ext.contacto')

</div>

@endsection