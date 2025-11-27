@extends('layouts.app')
@section('title', "Guia de jugadores")

@section('content')

<h1 class="text-3xl font-bold text-blue-800 mb-6">Jugadoras</h1>

@if (session('success'))

  <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">{{ session('success') }}</div>
@endif

<p class="mb-4">
  <a href="{{ route('jugadores.create') }}" class="bg-blue-600 text-white px-3 py-2 rounded hover:bg-blue-700">Nova jugadora</a>
</p>

@if($jugadoras->isEmpty()) <p>No hi ha jugadores registrades.</p>
@else

<table class="w-full border-collapse border border-gray-300">
  <thead class="bg-gray-200">
    <tr>
      <th class="border border-gray-300 p-2">Nom</th>
      <th class="border border-gray-300 p-2">Equip</th>
      <th class="border border-gray-300 p-2">Posició</th>
      <th class="border border-gray-300 p-2">Accions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($jugadoras as $jugadora)
    <tr class="hover:bg-gray-100">
      <td class="border border-gray-300 p-2">
        <a href="{{ route('jugadores.show', $jugadora->id) }}" class="text-blue-700 hover:underline">{{ $jugadora->nom }}</a>
      </td>
      <td class="border border-gray-300 p-2">{{ $jugadora->equip->nom ?? 'Sense equip' }}</td>
      <td class="border border-gray-300 p-2">{{ $jugadora->posicio }}</td>
      <td class="border border-gray-300 p-2 flex gap-2">
        <a href="{{ route('jugadores.edit', $jugadora->id) }}" class="text-yellow-600 hover:underline">Editar</a>
        <form action="{{ route('jugadores.destroy', $jugadora->id) }}" method="POST" onsubmit="return confirm('Segur que vols esborrar aquesta jugadora?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="text-red-600 hover:underline">Esborrar</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif
@endsection
