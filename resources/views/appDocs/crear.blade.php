@extends('layouts.app')
@section('content')
<div class="container">

<h3 class="h3 text-center">Subir nuevo documento</h3>

<form action="{{ url('/documentos')}}" method="post" enctype="multipart/form-data">
    @csrf
    @include('appDocs.formulario', ['texto_btn'=>'Crear documento'])
</form>




</div>
@endsection
