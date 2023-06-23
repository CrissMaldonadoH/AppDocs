@extends('layouts.app')
@section('content')
<div class="container">

    <h3 class="h3 text-center">Editar documento</h3>
    <form action="{{ url('/documentos/'.$documento['id'])}}" method="POST">
        @csrf
        {{ method_field('PATCH') }}
        @include('appDocs.formulario', ['texto_btn'=>'Actualizar documento'])

    </form>


</div>
@endsection
