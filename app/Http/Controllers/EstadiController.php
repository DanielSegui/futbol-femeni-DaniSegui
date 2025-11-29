<?php

namespace App\Http\Controllers;

use App\Models\Estadi;
use Illuminate\Http\Request;

class EstadiController extends Controller
{
    public function index()
    {
        $estadis = Estadi::all();
        return view('estadis.index', compact('estadis'));
    }

    public function show(Estadi $estadi)
    {
        return view('estadis.show', compact('estadi'));
    }

    public function create() { return view('estadis.create'); }

    public function store(Request $request)
    {
        $estadi = new Estadi($request->validated());
        $estadi->save();
        return redirect()->route('estadis.index')->with('success', 'Estadi creat correctament!');
    }

    public function edit(Estadi $estadi){
        return view('estadis.edit', compact('estadi'));
    }

    public function update(Request $request, Estadi $estadi){
        $estadi->update($request->validated());
        return redirect()->route('estadis.index')->with('success', 'Estadi actualitzat correctament!');
    }

    public function destroy(Estadi $estadi){
        $estadi->delete();
        return redirect()->route('estadis.index')->with('success', 'Estadi eliminat correctament!');
    }
}