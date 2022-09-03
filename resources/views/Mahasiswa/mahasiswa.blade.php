<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- CSS Assets -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>

    <title>Mahasiswa</title>
</head>

<body>
    <div class="container">

        <div class="l-right">
            <div class="title">
                <h2 class="fw-bold mt-5">Data Mahasiswa</h2>
            </div>

            <div class="row mt-3">
                <div class="col">
                    <a href="/mahasiswa/create">
                        <button class="btn btn-primary px-4 py-3">
                            + Tambah Data
                        </button>
                    </a>
                    <a href="/matkul">
                        <button class="btn btn-warning px-4 py-3">
                            Matkul
                        </button>
                    </a>
                    <a href="/nilai">
                        <button class="btn btn-success px-4 py-3">
                            Nilai
                        </button>
                    </a>
                </div>
            </div>

            <div class="ttable bg-white mt-3">
                <div class="">
                    <table class="table table-bordered">
                        @csrf
                        <thead class="bg-grey color-white">
                            <tr class="text-center table-success">
                                <th class="col-1 th1">No</th>
                                <th class="col-1 th1">Nim</th>
                                <th class="col-2 th1">Nama</th>
                                <th class="col-1 th1">Tanggal Lahir</th>
                                <th class="col-2 th1">Jenis Kelamin</th>
                                <th class="col-2 th1">Prodi</th>
                                <th class="col-2 th1">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="color-white color-neutral-400">
                            @foreach($data as $value)
                            <tr class="text-center">
                                <td class="col-1 td1">{{ $loop->iteration }}</td>
                                <td class="col-1 td1">{{ $value->nim}}</td>
                                <td class="col-1 td1">{{ $value->nama}}</td>
                                <td class="col-2 td1">{{ $value->tanggal_lahir}}</td>
                                <td class="col-2 td1">{{ $value->jenis_kelamin}}</td>
                                <td class="col-2 td1">{{ $value->prodi}}</td>
                                <td class="col-2 text-center">
                                    <a href="/mahasiswa/editMahasiswa/{{ $value->id }}" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#ffc107" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                    <a href="/mahasiswa/hapusMahasiswa/{{ $value->id }}" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#FF4C4C" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>