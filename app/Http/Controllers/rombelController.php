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
            'tingkat_rombel' => 'required|unique:rombels,tingkat_rombel',

        ]);

        $rombel = Rombel::create($request->all());
        $rombel->tingkat_rombel = $validate['tingkat_rombel'];
        $rombel->save();

        if ($rombel) {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->tingkat_rombel berhasil ditambahkan",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->tingkat_rombel gagal ditambahkan",
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
            'tingkat_rombel' => 'required|unique:rombels,tingkat_rombel',
        ]);

        $id = $request->id;
        $rombel = Rombel::find($id);
        if ($rombel != null) {
            $rombel->update([
                'tingkat_rombel' => $request->tingkat_rombel,
            ]);
        }
        $rombel->save();

        if ($rombel) {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->tingkat_rombel berhasil diubah",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->tingkat_rombel gagal diubah",
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
                'message' => "Data $rombel->tingkat_rombel berhasil dihapus",
                'style' => 'success'
            ]);
        } else {
            return redirect('backend/rombel')->with([
                'message' => "Data $rombel->tingkat_rombel gagal dihapus",
                'style' => 'danger'
            ]);
        }
    }
}
