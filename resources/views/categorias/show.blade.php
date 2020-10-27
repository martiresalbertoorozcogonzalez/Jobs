@extends('layouts.app')

@section('navegacion')
    @include('ext.adminnav')
@endsection


@section('content')

<div class="my-10 bg-white p-10 shadow">
    <h1 class="text-3xl text-gray-800 m-0">
        Categoria:
        <span class="font-bold">{{$categoria->nombre}}</span>
    </h1>

    @include('ext.listadovacantes')

</div>
@endsection
