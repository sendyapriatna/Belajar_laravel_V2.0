<!doctype html>
<html lang="en">

@extends('dashboard.layout.main')

@section('container')

<head>
    <title>Tambah Nilai</title>
</head>

<body>
    <div class="container">

        <div class="l-right">

            <div class="ttable border-line bg-white my-4">
                <div class="title">
                    <h2 class="fw-bold mt-5">Tambah Data Nilai Mahasiswa</h2>
                </div>
                <div class="p-2">
                    <form method="POST" action="/nilai/insertNilai/">
                        @csrf
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-3 col-form-label">Nim</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control color-neutral-400" name="nim" id="" value="{{ auth()->user()->nim }}">
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="" class="col-sm-3 col-form-label">Kode Matkul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control color-neutral-400" name="kode_matkul" id="">
                            </div>
                        </div>

                        <div class="form-group row py-2">
                            <label for="" class="col-sm-3 col-form-label">Nama Matkul</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control color-neutral-400" name="nama_matkul" id="">
                            </div>
                        </div>

                        @can('admin')
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control color-neutral-400" name="nilai" id="">
                            </div>
                        </div>
                        @endcan

                        <div class="form-group row mx-1 py-2">
                            <div class="col">
                                <label for="" class="col-3"></label>
                                <button type="submit" class="btn btn-primary ml-1 px-4 py-3">Simpan</button>
                                <a href="/nilai" type="button" class="btn btn-outline-danger ml-2 px-4 py-3"> Batal </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
@endsection