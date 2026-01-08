<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEstadiRequest;
use App\Http\Requests\UpdateEstadiRequest;
use App\Services\EstadiService;
use App\Models\Estadi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class EstadiController extends Controller {
    public function __construct(private EstadiService $servei) {}

    // GET /estadis
    public function index() {
        return view('estadis.index', ['estadis' => $this->servei->llistar()]);
    }

    // GET /estadis/create
    public function create() {
        $estadis = Estadi::all();
        return view('estadis.create',compact('estadis'));
    }
    // POST /estadis
    public function store(StoreEstadiRequest $request) {
        $this->servei->guardar($request->validated());
        return redirect()->route('estadis.index');
    }

    // GET /estadis/{id}
    public function show(Estadi $estadi) {
        return view('estadis.show', compact('estadi'));
    }

    // GET /estadis/{id}/edit
    public function edit(Estadi $estadi) {
        return view('estadis.edit', compact('estadi'));
    }

    // PUT /estadis/{id}/edit
    public function update(Request $request, Estadi $estadi) {
        $this->servei->actualitzar($estadi, $request->validated());
        return redirect()->route('estadis.index')->with('ok', 'estadi actualitzat');
    }

    // DELETE /estadis/{id}
    public function destroy($id) {
        $this->servei->eliminar($id);
        return redirect()->route('estadis.index');
    }
}