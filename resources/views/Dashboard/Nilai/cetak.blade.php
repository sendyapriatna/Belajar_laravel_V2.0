<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="/css/dashboard.css">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Print PDF</title>
</head>

<body>
    <div class="text-center">
        <h1 class="tect-center">DATA NILAI MAHASISWA</h1>
    </div>

    <div class="form-group">
        <table class="table table-bordered border" style="width: 95%;">
            @foreach($mahasiswa as $value)
            <tr class="text-center table-success">
                <th class="col-3" colspan="4">{{ $value->nama }} - {{ $value->nim }}</th>
            <tr class="text-center">
                <th class="th1">No</th>
                <th class="th1">Kode Matkul</th>
                <th class="th1">Nama Matkul</th>
                <th class="th1">Nilai</th>
            </tr>
            <?php $i = 1; ?>
            @foreach($data as $value2)
            <?php if ($value->nim == $value2->nim) { ?>
                <tr class="text-center">
                    <td class="td1"><?php echo $i;
                                    $i++ ?></td>
                    <td class="td1">{{ $value2->kode_matkul}}</td>
                    <td class="td1">{{ $value2->nama_matkul}}</td>
                    <td class="td1">{{ $value2->nilai}}</td>
                </tr>
            <?php } ?>
            @endforeach
            </tr>
            @endforeach
        </table>

    </div>

    <script type="text/javascript">
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
</body>

</html>