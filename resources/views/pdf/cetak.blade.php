<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>downloadpdf</title>

</head>
<body>

    <div class="container">

        <br>
        <h3 style="text-align: center">DATA TRANSAKSI</h3>

        <br>
        <br>

        <?php $no=1;?>
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                @foreach($tb_transaksi as $b)
                <tbody>
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $b->tanggal }}</td>
                        <td>{{ $b->nama_brg }}</td>
                        <td>{{ $b->jumlah }}</td>
                        <td>{{ $b->total_harga }}</td>
                    </tr>
                </tbody>
                @endforeach
            </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</body>
</html>