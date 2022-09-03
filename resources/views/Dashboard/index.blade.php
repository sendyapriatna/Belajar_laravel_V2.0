@extends('dashboard.layout.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>
<div class="col-lg-3 col-6">
    <!-- small box -->
    <!-- <div class="small-box bg-danger"> -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h5>
                <?php echo 'test'; ?>
            </h5>

            <p>Jumlah Mahasiswa</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="/mahasiswa" class="small-box-footer">Selengkapnya
            <i class="fas fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
@endsection