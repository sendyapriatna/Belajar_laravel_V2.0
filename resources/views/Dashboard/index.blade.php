@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>
<div class="row">
    <div class="col-3 small-box bg-warning position-relative" style="width:400px ; height:200px;  border-radius: 20px; margin-right:20px;">
        <div class="inner text-center position-absolute top-50 start-50 translate-middle">

            <h1>
                <i class="bi bi-person"></i>
                {{$data}}
            </h1>

            <p>Jumlah Mahasiswa</p>
            @can('admin')
            <a style="text-decoration:none;" href="/mahasiswa" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a>
            @endcan
        </div>

    </div>
    <div class="col-3 small-box bg-info position-relative" style="width:400px ; height:200px;  border-radius: 20px;">
        <div class="inner text-center position-absolute top-50 start-50 translate-middle">

            <h1>
                <i class="bi bi-book"></i>
                {{$data2}}
            </h1>

            <p>Jumlah Mata Kuliah</p>
            @can('admin')
            <a style="text-decoration:none;" href="/matkul" class="small-box-footer">Selengkapnya
                <i class="fas fa-arrow-circle-right"></i>
            </a>
            @endcan
        </div>

    </div>

</div>
@endsection