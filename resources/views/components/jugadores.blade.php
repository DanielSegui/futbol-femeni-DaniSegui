<div class="border rounded-lg p-4 bg-white shadow">
    <h3 class="text-xl font-bold mb-3 text-blue-700">Llistat de Jugadores</h3>

    @forelse($jugadores as $jugadora)
        <div class="mb-2">
            <strong>{{ $jugadora->nom }}</strong> - Dorsal: {{ $jugadora->dorsal }}
            - Naixement:{{ $jugadora->data_naixement }}
        </div>
    @empty
        <p class="text-gray-500">Aquest equip encara no té jugadores.</p>
    @endforelse
</div>