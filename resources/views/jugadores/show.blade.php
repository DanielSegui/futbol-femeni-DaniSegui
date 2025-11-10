@extends('layouts.app')
@section('title', "Detall jugadora")

@section('content')
<x-jugadora :nom="$jugadora['nom']" :equip="$jugadora['equip']" :posicio="$jugadora['posicio']"/>
@endsection