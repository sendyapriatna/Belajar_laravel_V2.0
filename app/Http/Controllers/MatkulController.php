<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MatkulController extends Controller
{
    public function index()
    {
        // $this->authorize('admin');
        // Query Builder
        $data = DB::table('matkul')->orderByRaw('kode_matkul')->paginate(10);
        return view('Dashboard.Matkul.matkul', ['data' => $data]);
    }

    public function create()
    {
        $this->authorize('admin');
        return view('Dashboard.Matkul.create');
    }

    public function insertMatkul(Request $post)
    {
        $this->authorize('admin');
        $valididatedData = $post->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required',
        ]);

        Matkul::create($valididatedData);
        return redirect('/matkul');
    }

    public function editMatkul($id)
    {
        $this->authorize('admin');
        $data = DB::table('matkul')->where('id', $id)->first();
        return view('Dashboard.Matkul.edit', ['data' => $data]);
    }

    public function updateMatkul(Request $post)
    {
        $this->authorize('admin');
        DB::table('matkul')->where('id', $post->id)->update([
            'kode_matkul' => $post->kode_matkul,
            'nama_matkul' => $post->nama_matkul,
            'sks' => $post->sks,
        ]);

        return redirect('/matkul');
    }

    public function hapusMatkul($id)
    {
        $this->authorize('admin');
        DB::table('matkul')->where('id', $id)->delete();
        return redirect('/matkul');
    }
}
