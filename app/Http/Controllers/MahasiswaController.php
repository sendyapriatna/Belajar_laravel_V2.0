<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    // public function admin()
    // {
    //     if (auth()->guest() || auth()->user()->name !== 'admin') {
    //         abort(403);
    //     }
    // }
    public function index()
    {
        $this->authorize('admin');
        // Query Builder
        $data = DB::table('mahasiswa')->orderByRaw('nim')->paginate(10);
        return view('Dashboard.Mahasiswa.mahasiswa', ['data' => $data]);
    }

    public function create()
    {
        $this->authorize('admin');
        return view('Dashboard.Mahasiswa.create');
    }

    public function insertMahasiswa(Request $post)
    {
        $this->authorize('admin');


        $post->session()->put('nim', $post->nim);

        $valididatedData = $post->validate([
            'nim' => 'required',
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

        User::create($valididatedData);
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
