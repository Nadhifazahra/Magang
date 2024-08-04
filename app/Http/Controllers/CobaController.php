<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coba;

class CobaController extends Controller
{
    public function index()
    {
        $dataCoba = (Coba::get());
        return view("coba_index", compact('dataCoba'));
    }

    public function create()
    {
        return view('coba_create');
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'nik' => 'required|string|max:255',
            'nama'  => 'required|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp'  => 'required|string',
            'status' => 'required|in:Mahasiswa,Siswa',
            'instansi' => 'required|string',
            'jurusan' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'surat_pengantar' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            
        ]);

        $data = $request->all();

        Coba::create($data);

        return redirect()->route('coba.index');
    }

    public function edit(string $id)
    {
        //$kategori = Kategori::findOrFail($id);
        //return view('kategori_edit', compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        //$request->validate([
        //    'nama' => 'required|string|max:255',
        //  'deskripsi' => 'required|string',
        //]);

        //$kategori = Kategori::findOrFail($id);
        //$kategori->update($request->all());
        //return redirect()->route('kategori.index');
    }

    public function destroy(string $id)
    {
        //$kategori = Kategori::findOrFail($id);
        //$kategori->delete();
        //return redirect()->route('kategori.index');
    }
}
