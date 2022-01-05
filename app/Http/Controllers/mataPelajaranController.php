<?php

namespace App\Http\Controllers;

use App\Http\Model\mataPelajaran;
use Illuminate\Http\Request;

class mataPelajaranController extends Controller
{
    public function index()
    {
        $mataPelajaran = mataPelajaran::all();
        return view('backend.mataPelajaran.index', compact('mataPelajaran'));
    }

    public function create()
    {
        return view('backend.mataPelajaran.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_mata_pelajaran' => 'required|unique:mata_pelajarans,nama_mata_pelajaran',
        ]);

        $mataPelajarn = mataPelajaran::create($request->all());
        $mataPelajarn->nama_mata_pelajaran = $validate['nama_mata_pelajaran'];
        $mataPelajarn->save();

        if ($mataPelajarn) {
            return redirect('backend/mata-pelajaran')->with([
                'message' => "Menambahkan Mata Pelajaran $mataPelajarn->nama_mata_pelajaran",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/mata-pelajaran')->with([
                'message' => 'Gagal Menambahkan Mata Pelajaran',
                'style' => 'error'
            ]);
        }
    }

    public function edit($id)
    {
        $mataPelajaran = mataPelajaran::find($id);
        return view('backend.mataPelajaran.edit', compact('mataPelajaran'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_mata_pelajaran' => 'required|unique:mata_pelajarans,nama_mata_pelajaran',
        ]);

        $id = $request->id;
        $mataPelajaran = mataPelajaran::find($id);
        if ($mataPelajaran != null) {
            $mataPelajaran->update([
                'nama_mata_pelajaran' => $request->nama_mata_pelajaran,
            ]);
        }

        if ($mataPelajaran) {
            return redirect('backend/mata-pelajaran')->with([
                'message' => "Mengubah Mata Pelajaran $mataPelajaran->nama_mata_pelajaran",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/mata-pelajaran')->with([
                'message' => "Gagal Mengubah Mata Pelajaran $mataPelajaran->nama_mata_pelajaran",
                'style' => 'error'
            ]);
        }
    }

    public function delete($id)
    {
        $mataPelajaran = mataPelajaran::find($id);
        $mataPelajaran->delete();

        if ($mataPelajaran) {
            return redirect('backend/mata-pelajaran')->with([
                'message' => "Menghapus Mata Pelajaran $mataPelajaran->nama_mata_pelajaran",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/mata-pelajaran')->with([
                'message' => "Gagal Menghapus Mata Pelajaran $mataPelajaran->nama_mata_pelajaran",
                'style' => 'error'
            ]);
        }
    }
}
