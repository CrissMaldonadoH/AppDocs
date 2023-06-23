@extends('layouts.app')
@section('content')
<div class="container">

    <h3 class="h3 text-center">Tus documentos</h3>
    @if(Session::has('mensaje'))
        <div class="alert alert-success text-success" role="alert">
          {{ Session::get('mensaje')}}
        </div>
    @endif

        @foreach ($documentos as $documento)
            <div class="d-flex p-2 w-100 align-items-center border border-secondary rounded my-3">
                <div class="contenido-documento  w-75">
                    <h2 class="h2">{{ $documento['DOC_NOMBRE'] }}</h2>
                    <p> {{ $documento['DOC_CONTENIDO'] }} </p>
                    <p>Consecutivo: {{ $documento['DOC_CODIGO'] }}</p>
                </div>
                <div class="acciones d-flex align-items-center justify-content-around w-25">
                    <form action="{{ url('/documentos/'.$documento['id']) }}" method="post" class="w-50">
                        @csrf
                        {{ method_field('DELETE') }}
                        <x-danger-button class="mt-3" onclick="return confirm('¿Desea borrar el registro?')">
                            {{ __('Eliminar') }}
                        </x-primary-button>
                    </form>
                    <a href="{{ url('/documentos/'.$documento['id'].'/edit') }}" class="w-50">
                        <x-primary-button class="mt-3">
                            {{ __('Editar') }}
                        </x-primary-button>
                    </a>
                </div>
            </div>
            @endforeach



</div>
@endsection
