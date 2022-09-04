<!doctype html>
<html lang="en">

@extends('dashboard.layout.main')

@section('container')

<head>
    <title>Tambah Nilai</title>
</head>

<body>
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
                            <input type="text" class="form-control color-neutral-400" name="nim" id="" value="{{ auth()->user()->nim }}" readonly>
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="" class="col-sm-3 col-form-label">Kode Matkul</label>
                        <div class="col-sm-8">
                            <div class="dropdown">
                                <select name="kode_matkul" id="kode_matkul" class="btn border btn-block text-start form-control  @error('kode_matkul') is-invalid @enderror">
                                    <!-- <option value="" selected>-- Pilih matkul --</option> -->
                                    <option value="" selected>-- Pilih Kode --</option>
                                    @foreach($matkul as $key)
                                    <option value="{{ $key->kode_matkul}}">{{ $key->kode_matkul }} - {{ $key->nama_matkul }}</option>
                                    @endforeach
                                </select>
                                @error('kode_matkul')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <!-- <input type="text" class="form-control color-neutral-400" name="kode_matkul" id=""> -->
                        </div>
                    </div>

                    <div class="form-group row py-2">
                        <label for="" class="col-sm-3 col-form-label">Nama Matkul</label>
                        <div class="col-sm-8">
                            <div class="dropdown">
                                <select name="nama_matkul" id="nama_matkul" class="btn border btn-block text-start form-control @error('nama_matkul') is-invalid @enderror">
                                    <!-- <option value="" selected>-- Pilih matkul --</option> -->
                                    <option value="" selected>-- Pilih Matkul --</option>
                                    @foreach($matkul as $key)
                                    <option value="{{ $key->nama_matkul}}">{{ $key->nama_matkul }} </option>
                                    @endforeach
                                </select>
                                @error('nama_matkul')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <!-- <input type="text" class="form-control color-neutral-400" name="nama_matkul" id=""> -->
                        </div>
                    </div>

                    <!-- @can('admin')
                        <div class="form-group row py-2">
                            <label for="" class="col-sm-3 col-form-label">Nilai</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control color-neutral-400" name="nilai" id="">
                            </div>
                        </div>
                        @endcan -->

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
</body>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#nama_matkul').change(function() {
            var id = $(this).val();
            console.log(id)
            $.ajax({
                type: 'get',
                url: '/get_matkul' + '/' + id,
                dataType: 'json',
                success: function(response) {
                    console.log(response['data']);
                    $('#id_register').val(response['data'].id_register);
                    $('#jenis_kelamin').val(response['data'].jenis_kelamin);
                    $('#alamat').val(response['data'].alamat);
                }
            });
        });
    });
</script>
@endsection