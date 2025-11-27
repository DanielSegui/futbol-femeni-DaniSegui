<div class="jugadora border rounded-lg shadow-md p-4 bg-white">
  <h2 class="text-xl font-bold text-blue-800">{{ $nom }}</h2>
  <p><strong>Equip:</strong> {{ $equip }}</p>
  <p><strong>Posició:</strong> {{ $posicio }}</p>
  @isset($data_naixement)
    <p><strong>Data de naixement:</strong> {{ $data_naixement }}</p>
  @endisset
  @isset($foto)
    <img src="{{ $foto }}" alt="{{ $nom }}" class="mt-2 w-32 h-32 object-cover rounded">
  @endisset
</div>
