<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polis = Poli::all();
        return view('pages.poli.index', compact('polis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.poli.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'nama_poli' => ['required'],
            'keterangan' => ['required']
        ]);

        Poli::create($rules);
        return redirect()->route('poli.index')->with('success', 'Poli berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $poli = Poli::findOrFail($id);
        return view('pages.poli.edit', compact('poli'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = $request->validate([
            'nama_poli' => ['required'],
            'keterangan' => ['required']
        ]);

        $obat = Poli::findOrFail($id);
        $obat->update($rules);
        return redirect()->route('poli.index')->with('success', 'Poli berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $poli = Poli::findOrFail($id);
        return redirect()->route('poli.index')->with('success', 'Poli berhasil dihapus');
    }
}
