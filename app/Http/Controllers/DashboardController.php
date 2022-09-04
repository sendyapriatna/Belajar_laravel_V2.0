<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Query Builder
        $data = DB::table('mahasiswa')->count();
        $data2 = DB::table('matkul')->count();
        // var_dump($data);
        // die;
        return view('Dashboard.index', ['data' => $data], ['data2' => $data2]);
    }

    public function create()
    {
        $this->authorize('admin');
        return view('Dashboard.Mahasiswa.create');
    }

    public function insertMahasiswa(Request $post)
    {
        $this->authorize('admin');

        $valididatedData = $post->validate([
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'prodi' => 'required',
        ]);

        Mahasiswa::create($valididatedData);

        DB::table('users')->insert([
            'name' => $post->nama,
            'email' => $post->nim . '@gmail.com',
            'password' => bcrypt($post['nim']),
            'nim' => $post->nim,
        ]);

        // var_dump($data);
        // die;
        // $valididatedData['password'] = bcrypt($valididatedData['password']);

        // User::create($valididatedData2);
        return redirect('/mahasiswa');
    }

    public function editMahasiswa($id)
    {
        $this->authorize('admin');
        $data = DB::table('mahasiswa')->where('id', $id)->first();
        return view('Dashboard.Mahasiswa.edit', ['data' => $data]);
    }

    public function updateMahasiswa(Request $post)
    {
        $this->authorize('admin');
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
        $this->authorize('admin');
        DB::table('mahasiswa')->where('id', $id)->delete();
        return redirect('/mahasiswa');
    }
}
