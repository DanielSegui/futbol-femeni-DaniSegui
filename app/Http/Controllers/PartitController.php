<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePartitRequest;
use App\Http\Requests\UpdatePartitRequest;
use App\Models\Equip;
use App\Models\Estadi;
use App\Services\PartitService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class PartitController extends Controller {
    public function __construct(private PartitService $servei) {}

    // GET /partits
    public function index() {
        return view('partits.index', ['partits' => $this->servei->llistar()]);
    }

    // GET /partits/create
    public function create() {
        $partits = Partit::all();
        return view('partits.create',compact('partits'));
    }
    // POST /partits
    public function store(StorePartitRequest $request) {
        $this->servei->guardar($request->validated());
        return redirect()->route('partits.index');
    }

    // GET /partits/{id}
    public function show(Partit $partit) {
        return view('partits.show', compact('partit'));
    }

    // GET /partits/{id}/edit
    public function edit(Partit $partit) {
        return view('partits.edit', compact('partit'));
    }

    // PUT /partits/{id}/edit
    public function update(Request $request, Partit $partit) {
        $this->servei->actualitzar($partit, $request->validated());
        return redirect()->route('partits.index')->with('ok', 'Partit actualitzat');
    }

    // DELETE /partits/{id}
    public function destroy($id) {
        $this->servei->eliminar($id);
        return redirect()->route('partits.index');
    }
}