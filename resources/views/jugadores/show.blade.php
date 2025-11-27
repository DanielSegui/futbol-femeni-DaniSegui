@extends('layouts.app')
@section('title', "Detall de Jugadora")

@section('content') <x-jugadora 
 :nom="$jugadora->nom" 
 :equip="$jugadora->equip->nom ?? 'Sense equip'" 
 :posicio="$jugadora->posicio" 
 :data_naixement="$jugadora->data_naixement"
 :foto="$jugadora->foto ? asset('storage/' . $jugadora->foto) : null"/> <a href="{{ route('jugadores.index') }}" class="text-blue-600 hover:underline mt-4 inline-block">Tornar enrere</a>
@endsection
