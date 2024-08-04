<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Carbon\Carbon;

class PengajuanController extends Controller
{
    public function index()
    {
        $dataPengajuan = (Pengajuan::get());
        return view("daftar_pengajuan", compact('dataPengajuan'));
    }

    public function create()
    {
        return view('pengajuan');
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
            'kartu' => 'required|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'proposal' => 'file|mimes:pdf,doc,docx,jpg,png|max:2048',
        ]);

        if ($request->hasFile('surat_pengantar')) {
            $file = $request->file('surat_pengantar');
            $filename = time() . '-surat_pengantar.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename, 'public');
            $data['surat_pengantar'] = $path;
        }

        if ($request->hasFile('kartu')) {
            $file = $request->file('kartu');
            $filename = time() . '-kartu.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename, 'public');
            $data['kartu'] = $path;
        }

        if ($request->hasFile('proposal')) {
            $file = $request->file('proposal');
            $filename = time() . '-proposal.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename, 'public');
            $data['proposal'] = $path;
        }

        $data = $request->all();

        Pengajuan::create($data);

        return redirect()->route('pengajuan.waiting');
    }

    public function waiting()
    {
        // Ambil data dengan status 'Waiting'
        $dataWaiting = Pengajuan::where('keterangan', 'Waiting')->get();
        return view('daftar_pengajuan', compact('dataWaiting'));
    }

    // PengajuanController.php
    public function approved()
    {
        $dataApproved = Pengajuan::where('keterangan', 'Approved')
            ->orWhere('keterangan', 'Active')
            ->get();

        return view('daftar_peserta', compact('dataApproved'));
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
