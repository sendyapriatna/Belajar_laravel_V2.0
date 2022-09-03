<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Query Builder
        $data = DB::table('mahasiswa')->orderByRaw('nim')->paginate(10);
        return view('Mahasiswa.mahasiswa',['data'=>$data]);
    }

    public function create()
    {
        return view('Mahasiswa.create');
    }

    public function insertMahasiswa(Request $post)
    {
            $valididatedData = $post->validate([
                'nim' => 'required',
                'nama' => 'required',
                'tanggal_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'prodi' => 'required',
            ]);

            Mahasiswa::create($valididatedData);
            return redirect('/mahasiswa');
    }

    public function editMahasiswa($id)
    {
        $data = DB::table('mahasiswa')->where('id', $id)->first();
        return view('Mahasiswa.edit', ['data' => $data]);
    }

    public function updateMahasiswa(Request $post)
    {
            DB::table('mahasiswa')->where('id', $post->id)->update([
                'nim' => $post->nim,
                'nama' => $post->nama,
                'tanggal_lahir' => $post->tanggal_lahir,
                'jenis_kelamin' => $post->jenis_kelamin,
                'prodi' => $post->prodi,
            ]);

            return redirect('/mahasiswa');
    }

    public function hapusMahasiswa($id)
    {   
        DB::table('mahasiswa')->where('id', $id)->delete();
        return redirect('/mahasiswa');
        
    }
}
