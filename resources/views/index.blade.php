<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIBOOKSTORE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand h1" href="#">UNIBOOKSTORE</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" aria-current="page" href="{{ route('index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active " aria-current="page" href="{{ route('admin') }}">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('pengadaan') }}">Pengadaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container mt-5">
            <table style="width: -webkit-fill-available;">
                <tbody>
                    <tr>
                        <td>
                            <h2 class="mb-4">Data Buku</h2>
                        </td>
                        <td>
                            <form action="{{ route('index') }}" method="GET" class="mb-3">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Cari buku..."
                                        value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>



            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Buku</th>
                            <th>Kategori</th>
                            <th>Nama Buku</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Penerbit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bukus as $buku)
                            <tr>
                                <td>{{ $buku->id_buku }}</td>
                                <td>{{ $buku->kategori }}</td>
                                <td>{{ $buku->nama_buku }}</td>
                                <td>Rp{{ number_format($buku->harga, 2, ',', '.') }}</td>
                                <td>{{ $buku->stok }}</td>
                                <td>{{ $buku->penerbit->nama ?? 'Tidak Ada' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>
