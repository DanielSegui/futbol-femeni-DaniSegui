<?php

namespace App\Http\Controllers;

use App\Services\JugadoraService;
use App\Http\Requests\StoreJugadoraRequest;
use App\Http\Requests\UpdateJugadoraRequest;
use Illuminate\Http\Request;

class JugadoraController extends Controller
{
    protected $jugadoraService;

    public function __construct(JugadoraService $jugadoraService)
    {
        $this->jugadoraService = $jugadoraService;
    }

    public function index()
    {
        $jugadoras = $this->jugadoraService->getAll();
        return view('jugadores.index', compact('jugadoras'));
    }

    public function show($id)
    {
        $jugadora = $this->jugadoraService->getById($id);
        abort_if(!$jugadora, 404);
        return view('jugadores.show', compact('jugadora'));
    }

    public function create()
    {
        $equips = $this->jugadoraService->getEquips(); // Para el select de equipos
        return view('jugadores.create', compact('equips'));
    }

    public function store(StoreJugadoraRequest $request)
    {
        $this->jugadoraService->create($request->validated());
        return redirect()->route('jugadores.index')->with('success', 'Jugadora afegida correctament!');
    }

    public function edit($id)
    {
        $jugadora = $this->jugadoraService->getById($id);
        abort_if(!$jugadora, 404);
        $equips = $this->jugadoraService->getEquips();
        return view('jugadores.edit', compact('jugadora', 'equips'));
    }

    public function update(UpdateJugadoraRequest $request, $id)
    {
        $this->jugadoraService->update($id, $request->validated());
        return redirect()->route('jugadores.index')->with('success', 'Jugadora actualitzada correctament!');
    }

    public function destroy($id)
    {
        $this->jugadoraService->delete($id);
        return redirect()->route('jugadores.index')->with('success', 'Jugadora eliminada correctament!');
    }
}
