<?php

namespace App\Http\Controllers;

use App\Models\Poli;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = Dokter::with('poli')->paginate(10);
        return view('pages.dokter.index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $polis = Poli::all();
        return view('pages.dokter.create', compact('polis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = $request->validate([
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'no_hp' => ['required', Rule::unique('dokters', 'no_hp')],
            'id_poli' => ['required', Rule::exists('polis', 'id')],
            'password' => ['required', 'string', 'min:6'],
            'password_konfirmasi' => ['required', 'string', 'same:password']
        ]);

        try {
            $request->merge(['password' => Hash::make($request->input('password'))]);
            $data = $request->except('password_konfirmasi');
            Dokter::create($data);

            return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->route('dokter.index')->with('error', 'Data dokter gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $polis = Poli::get();
        return view('pages.dokter.edit', compact('dokter', 'polis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => ['required', 'string'],
            'alamat' => ['required', 'string'],
            'no_hp' => ['required', Rule::unique('dokters', 'no_hp')],
            'id_poli' => ['required', Rule::exists('polis', 'id')],
            'password' => ['nullable', 'string', 'min:6'],
            'password_konfirmasi' => ['nullable', 'string', 'same:password']
        ]);

        try {
            $data = $request->except('password_konfirmasi');
            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->input('password'));
            } else {
                unset($data['password']);
            }

            $dokter = Dokter::findOrFail($id);

            $dokter->update($data);
            return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diupdate');
        } catch (\Throwable $th) {
            return redirect()->route('dokter.index')->with('error', 'Data dokter gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $dokter = Dokter::findOrFail($id);
            $dokter->delete();
            return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('dokter.index')->with('error', 'Data dokter berhasil dihapus');
        }
    }
}
