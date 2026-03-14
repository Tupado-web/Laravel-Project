<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $pegawai = Pegawai::when($search, function ($query) use ($search){
            $query->where('nama_pegawai', 'like', "%{$search}%")
            ->orwhere('jabatan', 'like', "%{$search}%")
            ->orwhere('jenis_kelamin', 'like', "%{$search}%");
                
        })->paginate(10);
        return view('pegawai.index', compact('pegawai', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pegawai' => 'required|string',
            'alamat' => 'required|string',
            'umur' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki, Perempuan',
            'jabatan' => 'required|string',
            'gaji' => 'required|integer',
        ]);
        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'data berhasil di tambahkan');
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
        return view('pegawai.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, Pegawai $pegawai)
    {
        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();

        return redirect()->route('pegawai.index')->with('success', 'data berhasil dihapus');
    }
}
