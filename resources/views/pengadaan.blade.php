<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengadaan - Pengadaan Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Laporan Kebutuhan Buku</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Judul Buku</th>
                        <th>Nama Penerbit</th>
                        <th>Stok Tersisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bukus as $buku)
                        <tr>
                            <td>{{ $buku->nama_buku }}</td>
                            <td>{{ $buku->penerbit->nama ?? 'Tidak Ada' }}</td>
                            <td>{{ $buku->stok }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin') }}" class="btn btn-secondary mt-3">Kembali ke Admin</a>
    </div>
</body>

</html>
