<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Daftar Buku & Penerbit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand h1" href="#">UNIBOOKSTORE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" aria-current="page" href="{{ route('admin') }}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('pengadaan') }}">Pengadaan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!--KONTEN BUKU-->
        <table style="width: -webkit-fill-available;">
            <tbody>
                <tr>
                    <td>
                        <h2 class="mb-4">Pengelolaan Buku</h2>
                    </td>
                    <td style="float: inline-end;">
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#createBukuModal">Tambah Buku</button>
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
                        <th style="text-align-last: center;">Action</th>
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
                            <td style="text-align-last: center;">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editBukuModal{{ $buku->id }}">✏️</button>
                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus buku ini?')">🗑</button>
                                </form>
                            </td>
                        </tr>

                        <!--EDIT-->
                        <div class="modal fade" id="editBukuModal{{ $buku->id }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Buku</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('buku.update', $buku->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label">ID Buku</label>
                                                <input type="text" class="form-control" name="id_buku"
                                                    value="{{ $buku->id_buku }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kategori</label>
                                                <input type="text" class="form-control" name="kategori"
                                                    value="{{ $buku->kategori }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Buku</label>
                                                <input type="text" class="form-control" name="nama_buku"
                                                    value="{{ $buku->nama_buku }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Harga</label>
                                                <input type="number" class="form-control" name="harga"
                                                    value="{{ $buku->harga }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Stok</label>
                                                <input type="number" class="form-control" min="1" name="stok"
                                                    value="{{ $buku->stok }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Penerbit</label>
                                                <select class="form-control" name="id_penerbit" required>
                                                    @foreach ($penerbits as $penerbit)
                                                        <option value="{{ $penerbit->id }}"
                                                            {{ $buku->id_penerbit == $penerbit->id ? 'selected' : '' }}>
                                                            {{ $penerbit->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--CREATE-->
        <div class="modal fade" id="createBukuModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Buku</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('buku.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">ID Buku</label>
                                <input type="text" class="form-control" name="id_buku" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" class="form-control" name="kategori" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Buku</label>
                                <input type="text" class="form-control" name="nama_buku" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control" name="harga" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="number" class="form-control" min="1" name="stok" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Penerbit</label>
                                <select class="form-control" name="id_penerbit" required>
                                    @foreach ($penerbits as $penerbit)
                                        <option value="{{ $penerbit->id }}"
                                            {{ $buku->id_penerbit == $penerbit->id ? 'selected' : '' }}>
                                            {{ $penerbit->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--KONTEN BUKU-->

        <!-- KONTEN PENERBIT -->
        <table style="width: -webkit-fill-available;">
            <tbody>
                <tr>
                    <td>
                        <h2 class="mb-4">Pengelolaan Penerbit</h2>
                    </td>
                    <td style="float: inline-end;">
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#createPenerbitModal">Tambah Penerbit</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Penerbit</th>
                        <th>Nama Penerbit</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Telepon</th>
                        <th style="text-align-last: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penerbits as $penerbit)
                        <tr>
                            <td>{{ $penerbit->id_penerbit }}</td>
                            <td>{{ $penerbit->nama }}</td>
                            <td>{{ $penerbit->alamat }}</td>
                            <td>{{ $penerbit->kota }}</td>
                            <td>{{ $penerbit->telepon }}</td>
                            <td style="text-align-last: center;">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editPenerbitModal{{ $penerbit->id }}">✏️</button>
                                <form action="{{ route('penerbit.destroy', $penerbit->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus penerbit ini?')">🗑</button>
                                </form>
                            </td>
                        </tr>

                        <!--EDIT-->
                        <div class="modal fade" id="editPenerbitModal{{ $penerbit->id }}" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Penerbit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('penerbit.update', $penerbit->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label">ID Penerbit</label>
                                                <input type="text" class="form-control" name="id_penerbit"
                                                    value="{{ $penerbit->id_penerbit }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama Penerbit</label>
                                                <input type="text" class="form-control" name="nama"
                                                    value="{{ $penerbit->nama }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <input type="text" class="form-control" name="alamat"
                                                    value="{{ $penerbit->alamat }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Kota</label>
                                                <input type="text" class="form-control" name="kota"
                                                    value="{{ $penerbit->kota }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Telepon</label>
                                                <input type="text" class="form-control" name="telepon"
                                                    value="{{ $penerbit->telepon }}" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!--CREATE-->
        <div class="modal fade" id="createPenerbitModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Penerbit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('penerbit.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">ID Penerbit</label>
                                <input type="text" class="form-control" name="id_penerbit" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Penerbit</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kota</label>
                                <input type="text" class="form-control" name="kota" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="text" class="form-control" name="telepon" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- KONTEN PENERBIT -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
