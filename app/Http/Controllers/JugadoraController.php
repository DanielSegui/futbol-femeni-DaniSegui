<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJugadoraRequest;
use App\Http\Requests\UpdateJugadoraRequest;
use App\Models\Equip;
use App\Models\Estadi;
use App\Models\Jugadora;
use App\Services\JugadoraService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class JugadoraController extends Controller {
    public function __construct(private JugadoraService $servei) {}

    // GET /jugadores
    public function index() {
        return view('jugadores.index', ['jugadores' => $this->servei->llistar()]);
    }

    // GET /jugadores/create
    public function create() {
        $jugadores = Jugadora::all();
        return view('jugadores.create',compact('jugadores'));
    }
    // POST /jugadores
    public function store(StoreJugadoraRequest $request) {
        $this->servei->guardar($request->validated());
        return redirect()->route('jugadores.index');
    }

    // GET /jugadores/{id}
    public function show(Jugadora $jugadora) {
        return view('jugadores.show', compact('jugadora'));
    }

    // GET /jugadores/{id}/edit
    public function edit(Jugadora $jugadora) {
        return view('jugadores.edit', compact('jugadora'));
    }

    // PUT /jugadores/{id}/edit
    public function update(Request $request, Jugadora $jugadora) {
        $this->servei->actualitzar($jugadora, $request->validated());
        return redirect()->route('jugadores.index')->with('ok', 'Jugadora actualitzada');
    }

    // DELETE /jugadores/{id}
    public function destroy($id) {
        $this->servei->eliminar($id);
        return redirect()->route('jugadores.index');
    }
}