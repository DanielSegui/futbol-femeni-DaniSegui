<!-- resources/views/jugadores/create.blade.php -->

@extends('layouts.app')
@section('title', 'Afegir nova jugadora')

@section('content')

<h1 class="text-2xl font-bold mb-4">Afegir nova jugadora</h1>

@if ($errors->any())

  <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('jugadores.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
  @csrf

  <div>
    <label for="nom" class="block font-bold">Nom:</label>
    <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="border p-2 w-full">
  </div>

  <div>
    <label for="equip_id" class="block font-bold">Equip:</label>
    <select name="equip_id" id="equip_id" class="border p-2 w-full">
      <option value="">Selecciona un equip</option>
      @foreach($equips as $equip)
        <option value="{{ $equip->id }}" {{ old('equip_id') == $equip->id ? 'selected' : '' }}>
          {{ $equip->nom }}
        </option>
      @endforeach
    </select>
  </div>

  <div>
    <label for="posicio" class="block font-bold">Posició:</label>
    <select name="posicio" id="posicio" class="border p-2 w-full">
      @foreach(['Portera','Defensa','Migcampista','Davantera'] as $pos)
        <option value="{{ $pos }}" {{ old('posicio') == $pos ? 'selected' : '' }}>
          {{ $pos }}
        </option>
      @endforeach
    </select>
  </div>

  <div>
    <label for="data_naixement" class="block font-bold">Data de Naixement:</label>
    <input type="date" name="data_naixement" id="data_naixement" value="{{ old('data_naixement') }}" class="border p-2 w-full">
  </div>

  <div>
    <label for="foto" class="block font-bold">Foto (opcional, PNG):</label>
    <input type="file" name="foto" id="foto" accept="image/png" class="border p-2 w-full">
  </div>

<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Afegir</button>

</form>
@endsection
