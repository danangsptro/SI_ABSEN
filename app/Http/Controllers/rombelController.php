<?php

namespace App\Http\Controllers;

use App\Http\Model\Rombel;
use Illuminate\Http\Request;

class rombelController extends Controller
{
    public function index()
    {
        $rombel = Rombel::all();
        return view('backend.rombel.index', compact('rombel'));
    }

    public function create()
    {
        return view('backend.rombel.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'kelas' => 'required|unique:rombels,kelas',

        ]);

        $rombel = Rombel::create($request->all());
        $rombel->kelas = $validate['kelas'];
        $rombel->save();

        if ($rombel) {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->kelas berhasil ditambahkan",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->kelas gagal ditambahkan",
                'style' => 'danger'
            ]);
        }
    }

    public function edit($id)
    {
        $rombel = Rombel::find($id);
        return view('backend.rombel.edit', compact('rombel'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'kelas' => 'required|unique:rombels,kelas',
        ]);

        $id = $request->id;
        $rombel = Rombel::find($id);
        if ($rombel != null) {
            $rombel->update([
                'kelas' => $request->kelas,
            ]);
        }
        $rombel->save();

        if ($rombel) {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->kelas berhasil diubah",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->kelas gagal diubah",
                'style' => 'danger'
            ]);
        }
    }


    public function delete($id)
    {
        $rombel = Rombel::find($id);
        $rombel->delete();

        if ($rombel) {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->kelas berhasil dihapus",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->kelas gagal dihapus",
                'style' => 'danger'
            ]);
        }
    }
}
