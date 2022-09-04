<!doctype html>
<html lang="en">
@extends('dashboard.layout.main')
@section('container')

<head>
    <title>Tambah Mahasiswa</title>
</head>

<body>
    <div class="l-right">

        <div class="ttable border-line bg-white my-4">
            <div class="title">
                <h2 class="fw-bold mt-5">Tambah Data Mahasiswa</h2>
            </div>
            <div class="p-2">
                <form method="POST" action="insertMahasiswa">
                    @csrf
                    <div class="form-group row py-2">
                        <label for="" class="col-sm-3 col-form-label @error('nim') is-invalid @enderror">Nim</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control color-neutral-400" name="nim" id="" placeholder="19000XXXXX">
                        </div>
                        @error('nim')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group row py-2">
                        <label for="" class="col-sm-3 col-form-label">Nama Pasien</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control color-neutral-400" name="nama" id="" placeholder="Ikoiii">
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control color-neutral-400" name="tanggal_lahir" id="">
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-8">
                            <div class="dropdown">
                                <select name="jenis_kelamin" id="status" class="btn border color-neutral-400 btn-block text-start form-control">
                                    <option selected>-- Pilih Jenis Kelamin --</option>
                                    <option>L</option>
                                    <option>P</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="" class="col-sm-3 col-form-label">Prodi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control color-neutral-400" name="prodi" id="" placeholder="Teknik Informatika">
                        </div>
                    </div>

                    <div class="form-group row mx-1 py-2">
                        <div class="col">
                            <label for="" class="col-3"></label>
                            <button type="submit" class="btn btn-primary ml-1 px-4 py-3">Simpan</button>
                            <a href="/mahasiswa" type="button" class="btn btn-outline-danger ml-2 px-4 py-3"> Batal </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection