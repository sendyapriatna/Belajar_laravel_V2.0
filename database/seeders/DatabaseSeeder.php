<?php

namespace Database\Seeders;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\Nilai;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $int = mt_rand(1262055681,1262055681);
        $arr = array('L'=>'0', 'P'=>'1');

        DB::table('mahasiswa')->insert([
            'nim' => mt_rand(1900018001,1900018999),
            'nama' => Str::random(10),
            'tanggal_lahir' => date("Y-m-d H:i:s",$int),
            'jenis_kelamin' => array_rand($arr),
            'prodi' => 'Teknik Informatika',
        ]);

        DB::table('matkul')->insert([
            'kode_matkul' => 'MK'.mt_rand(0001,9999),
            'nama_matkul' => 'Pemrograman Web',
            'sks' => '3',
        ]);
    }
}
