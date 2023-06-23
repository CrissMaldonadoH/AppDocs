

<div class="mt-2">
    <x-input-label for="documento" :value="__('Nombre del documento')" />
    <x-text-input
    id="documento"
    class=""
    type="text"
    name="documento"
    placeholder="Ej: Instructivo de Desarrollo"
    value="{{ isset($documento['DOC_NOMBRE'])?$documento['DOC_NOMBRE']:'' }}"
    />
    @error('documento')
     <span style="color: red; border: hsl(0, 100%, 27%); color: rgb(124, 0, 0); background-color: rgb(255, 209, 209);
     "> {{ $message }} </span>
    @enderror
</div>
<div class="mt-2">

    <x-input-label for="proceso" :value="__('Proceso')" />
    <select
        id="proceso"
        class="form-select"
        name="proceso"
        value="{{ isset($documento['DOC_ID_PROCESO'])?$documento['DOC_ID_PROCESO']:'' }}"
    >
    <option disabled>--Seleccione--</option>
    @foreach ($procesos as $proceso)
        <option value="{{ $proceso['id'] }}">{{ $proceso['PRO_NOMBRE'] }}</option>
    @endforeach
    </select>
    @error('proceso')
     <span style="color: red; border: hsl(0, 100%, 27%); color: rgb(124, 0, 0); background-color: rgb(255, 209, 209);
     "> {{ $message }} </span>
    @enderror
</div>
<div class="mt-2">
    <x-input-label for="tipo" :value="__('Tipo')" />
    <select
        id="tipo"
        class="form-select"
        name="tipo"
        value="{{ isset($documento['DOC_ID_TIPO'])?$documento['DOC_ID_TIPO']:'' }}"
    >
    <option disabled>--Seleccione--</option>
    @foreach ($tipos as $tipo)
        <option value="{{ $tipo['id'] }}">{{ $tipo['TIP_NOMBRE'] }}</option>
    @endforeach
    </select>
    @error('tipo')
     <span style="color: red; border: hsl(0, 100%, 27%); color: rgb(124, 0, 0); background-color: rgb(255, 209, 209);
     "> {{ $message }} </span>
    @enderror
</div>
<div class="mt-2">
    <x-input-label for="descripcion" :value="__('Describa el documento')" />
    <textarea
    id="descripcion"
    class="form-control"
    type="text"
    name="descripcion"
    value="{{ isset($documento['DOC_CONTENIDO'])?$documento['DOC_CONTENIDO']:'' }}">
    </textarea>
    @error('descripcion')
     <span style="color: red; border: hsl(0, 100%, 27%); color: rgb(124, 0, 0); background-color: rgb(255, 209, 209);
     "> {{ $message }} </span>
    @enderror
</div>
<x-primary-button class="mt-3 btn-formulario">
    {{ __( $texto_btn ) }}
</x-primary-button>
