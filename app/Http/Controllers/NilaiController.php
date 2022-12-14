<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class NilaiController extends Controller
{
    public function index()
    {
        // die;
        // Eloquent
        $mahasiswa = Mahasiswa::all();
        // return view('Mahasiswa.mahasiswa',compact(['mahasiswa']));

        // Query Builder
        $data = DB::table('nilai')->paginate(10);

        return view('Dashboard.Nilai.nilai', ['data' => $data], compact(['mahasiswa']));
    }

    public function cetak()
    {
        $this->authorize('admin');
        // die;
        // Eloquent
        $mahasiswa = Mahasiswa::all();
        // return view('Mahasiswa.mahasiswa',compact(['mahasiswa']));

        // Query Builder
        $data = DB::table('nilai')->paginate(10);

        return view('Dashboard.Nilai.cetak', ['data' => $data], compact(['mahasiswa']));
    }


    public function create()
    {
        $matkul = DB::table('matkul')->get();
        $data = array(
            'matkul' => $matkul,
        );
        return view('Dashboard.Nilai.create', $data);
    }

    public function insertNilai(Request $post)
    {
        // $cek = $post->session()->get('nim');
        // var_dump($cek);
        // die;
        $valididatedData = $post->validate([
            'nim' => 'required',
            'kode_matkul' => 'required|unique:nilai',
            'nama_matkul' => 'required|unique:nilai',
            // 'nilai' => 'required',
        ]);

        Nilai::create($valididatedData);
        return redirect('/nilai');
    }

    public function editNilai($id)
    {
        $data = DB::table('nilai')->where('id', $id)->first();
        return view('Dashboard.Nilai.edit', ['data' => $data]);
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

    // public function cetak_pdf()
    // {
    //     $data = Nilai::all();
    //     $mahasiswa = Mahasiswa::all();

    //     $pdf = PDF::loadView('/Dashboard.Nilai.nilai', ['data' => $data], ['mahasiswa' => $mahasiswa]);
    //     return $pdf->download('nilai.pdf');
    // }
}
