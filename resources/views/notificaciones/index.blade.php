@extends('layouts.app')

@section('navegacion')
    @include('ext.adminnav')
@endsection

@section('content')

<h1 class="text-2xl text-center mt-10">Notificaciones</h1>

@if (count($notificaciones) > 0)

@foreach ($notificaciones as $notificacion)

<ul class="max-w-md mx-auto mt-10">
  @php
      $data = $notificacion->data
  @endphp

  <li class="p-5 border border-gray-500 mb-5">
    <p class="mb-4">
        Tienes un nuevo candidato en:
        <span class="font-bold">{{$data['vacante']}}</span>
    </p>
  </li>

</ul>

@endforeach

@else
<p class="text-center mt-5">No hay notificaciones</p>
@endif

@endsection
