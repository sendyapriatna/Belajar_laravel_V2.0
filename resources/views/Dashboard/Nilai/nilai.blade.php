<!doctype html>
<html lang="en">

@extends('dashboard.layout.main')

@section('container')

<head>
    <title>Nilai</title>
</head>

<body>
    <div class="l-right">
        <div class="title">
            <h2 class="fw-bold mt-5">Mata Kuliah Yang di Ambil</h2>
        </div>

        <div class="row mt-3">
            <div class="col">
                @can('!admin')
                <a href="/nilai/create/">
                    <button class="btn btn-primary px-4 py-3"><i class="bi bi-plus-square"></i>
                        Tambah Data
                    </button>
                </a>
                @endcan
                @can('admin')
                <a href="/cetak" target="_blank">
                    <button class="btn btn-success px-4 py-3"><i class="bi bi-printer"></i>
                        Cetak PDF
                    </button>
                </a>
                @endcan
            </div>
        </div>

        <div class="ttable bg-white mt-3">
            <div class="">
                <table class="table table-bordered">

                    <!-- view user -->
                    <thead class=" bg-grey color-white">
                        @can('!admin')
                        <tr class="text-center table-success">
                            <th class="col-1 th1">No</th>
                            <th class="col-1 th1">Kode</th>
                            <th class="col-2 th1">Nama Matkul</th>
                            <th class="col-2 th1">Nilai</th>
                            <th class="col-2 th1">Aksi</th>
                        </tr>
                        @endcan
                    </thead>
                    <tbody class="color-white color-neutral-400">
                        <?php $i = 1; ?>
                        @foreach($data as $value)
                        <?php if ($value->nim == auth()->user()->nim) { ?>
                            <tr class="text-center">
                                <td class="col-1 td1"><?php echo $i;
                                                        $i++; ?></td>
                                <td class="col-1 td1">{{ $value->kode_matkul}}</td>
                                <td class="col-2 td1">{{ $value->nama_matkul}}</td>
                                <td class="col-2 td1">{{ $value->nilai}}</td>
                                <td class="col-2 text-center">
                                    <!-- @can('admin')
                                        <a href="/nilai/editNilai/{{ $value->id }}" class="btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffc107" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                            </svg>
                                        </a>
                                        @endcan -->
                                    <?php if ($value->nilai == 0) { ?>
                                        <a href="/nilai/hapusNilai/{{ $value->id }}" class="btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FF4C4C" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </a>
                                    <?php } else { ?>
                                        <a href="/nilai/hapusNilai/{{ $value->id }}" class="btn disabled">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#828282" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                            </svg>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                        @endforeach
                    </tbody>

                    <!-- view admin -->
                    @can('admin')
                    <tbody class="color-white color-neutral-400">
                        @foreach($mahasiswa as $value)
                        <tr class="text-center table-success">
                            <th class="col-3" colspan="5">{{ $value->nama }} - {{ $value->nim }}</th>
                            <thead class="bg-grey color-white">
                                <tr class="text-center">
                                    <th class="th1">No</th>
                                    <th class="th1">Kode Matkul</th>
                                    <th class="th1">Nama Matkul</th>
                                    <th class="th1">Nilai</th>
                                    <th class="th1">Aksi</th>
                                </tr>
                            </thead>

                            <?php $i = 1; ?>
                            @foreach($data as $value2)
                            <?php if ($value->nim == $value2->nim) { ?>
                        </tr>
                        <tr class="text-center">
                            <td class="td1"><?php echo $i;
                                            $i++ ?></td>
                            <td class="td1">{{ $value2->kode_matkul}}</td>
                            <td class="td1">{{ $value2->nama_matkul}}</td>
                            <td class="td1">{{ $value2->nilai}}</td>
                            <td class="text-center">
                                <a href="/nilai/editNilai/{{ $value2->id }}" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffc107" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                                <a href="/nilai/hapusNilai/{{ $value2->id }}" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FF4C4C" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </a>
                            </td>

                        </tr>
                    <?php } ?>
                    @endforeach

                    @endforeach
                    </tbody>
                    @endcan
                </table>
            </div>
        </div>
    </div>
</body>
@endsection