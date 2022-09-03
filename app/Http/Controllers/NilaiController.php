<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    public function index()
    {
        // Eloquent
        $mahasiswa = Mahasiswa::all();
        // return view('Mahasiswa.mahasiswa',compact(['mahasiswa']));

        // Query Builder
        $data = DB::table('nilai')->paginate(100);
        return view('Nilai.nilai',['data'=>$data],compact(['mahasiswa']));
    }

    public function create()
    {
        return view('Nilai.create');
    }

    public function insertNilai(Request $post)
    {
            $valididatedData = $post->validate([
                'nim' => 'required',
                'kode_matkul' => 'required',
                'nama_matkul' => 'required',
                'nilai' => 'required',
            ]);

            Nilai::create($valididatedData);
            return redirect('/nilai');
    }

    public function editNilai($id)
    {
        $data = DB::table('nilai')->where('id', $id)->first();
        return view('Nilai.edit', ['data' => $data]);
    }

    public function updateNilai(Request $post)
    {
            DB::table('nilai')->where('id', $post->id)->update([
                // 'nim' => $post->nim,
                'kode_matkul' => $post->kode_matkul,
                'nama_matkul' => $post->nama_matkul,
                'nilai' => $post->nilai,
            ]);

            return redirect('/nilai');
    }

    public function hapusNilai($id)
    {   
        DB::table('nilai')->where('id', $id)->delete();
        return redirect('/nilai');
        
    }
}
