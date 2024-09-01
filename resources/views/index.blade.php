<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Sesi Training HAFECS</title>
</head>

<style>
    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th,
    .table td {
        border: 2px solid black;
        text-align: center;
    }

    .container-1 {
        border: 2px solid;
    }
</style>

<body>
    <div class="container">
        <header class="header mt-3">
            <img class=" header-image " width="25%" src="img/logo.png" alt="Yayasan Hasnur Centre">
            <img class=" header-image-2 " width="25%" src="img/logo2.jpg" alt="Yayasan Hasnur Centre">
        </header>

        <div class="container-1 mt-3 p-3 mb-2">
            <h2>Jadwal Sesi Pelatihan HAFECS</h2>

            <div class="table-group-divider">
                <!-- Form Filter -->
                <form action="{{ route('pelatihan.index') }}" method="GET" class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <button type="button" class="btn btn-primary mt-4 mb-0" data-bs-toggle="modal" data-bs-target="#tambahModal">Tambah Pelatihan +</button>
                        </div>

                        <!-- Kolom filter -->
                        <div class="d-flex">
                            <div class="me-2">
                                <label for="filter_tanggal" class="form-label">Tanggal:</label>
                                <input type="date" class="form-control" id="filter_tanggal" name="tanggal" value="{{ request('tanggal') }}">
                            </div>
                            <div class="me-2">
                                <label for="filter_sesi" class="form-label">Sesi:</label>
                                <select class="form-select" id="filter_sesi" name="sesi">
                                    <option value="">Semua</option>
                                    <option value="1" {{ request('sesi') == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ request('sesi') == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ request('sesi') == '3' ? 'selected' : '' }}>3</option>
                                </select>
                            </div>
                            <div>
                                <label for="button" class="mb-2">&nbsp;</label>
                                <button type="submit" class="btn btn-primary form-control">Filter</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END form filter -->
            </div>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Trainer</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Sesi</th>
                        <th scope="col">Waktu/Jam</th>
                        <th scope="col">Topik</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelatihan as $index => $p )
                    <tr>
                        <td>{{$index +1}}</td>
                        <td>{{$p -> nama_trainer}}</td>
                        <td>{{$p -> tanggal}}</td>
                        <td>{{$p -> sesi}}</td>
                        <td>{{$p -> waktu}}</td>
                        <td>{{$p -> topik}}</td>
                        <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{$p->id}}"> Edit </button>
                            <form action="{{ route('pelatihan.destroy', $p->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin mau menghapus?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                {{ $pelatihan->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
            <div class="d-flex justify-content-start mb-3">
                <a href="{{ route('pelatihan.exportPdf') }}" class="btn btn-danger">Export PDF</a>
            </div>
        </div>
        <!-- Modal Tambah-->
        <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tambahModalLabel">Tambah Pelatihan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{  route('pelatihan.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="from-group mb-3">
                                <label for="nama_trainer">Nama Trainer :</label>
                                <input type="text" class="form-control" name="nama_trainer" id="nama_trainer" required>
                            </div>
                            <div class="from-group mb-3">
                                <label for="tanggal">Tanggal :</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="sesi">Sesi:</label>
                                <select class="form-select" id="sesi" name="sesi">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="from-group mb-3">
                                <label for="waktu">Waktu :</label>
                                <input type="time" class="form-control" name="waktu" id="waktu" required>
                            </div>
                            <div class="from-group mb-3">
                                <label for="topik">Topik :</label>
                                <input type="text" class="form-control" name="topik" id="topik" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Modal Tambah -->


        <!-- Modal Edit -->
        @foreach ($pelatihan as $p)

        <div class="modal fade" id="editModal{{$p->id}}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Pelatihan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('pelatihan.update',$p->id) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="from-group mb-3">
                                <label for="nama_trainer">Nama Trainer :</label>
                                <input type="text" class="form-control" name="nama_trainer" id="nama_trainer" value="{{$p->nama_trainer}}" required>
                            </div>
                            <div class="from-group mb-3">
                                <label for="tanggal">Tanggal :</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{$p->tanggal}}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="sesi">Sesi:</label>
                                <select class="form-select" id="sesi" name="sesi" disabled>
                                    <option value="1" {{ $p->sesi == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $p->sesi == 2 ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ $p->sesi == 3 ? 'selected' : '' }}>3</option>
                                </select>
                            </div>
                            <div class="from-group mb-3">
                                <label for="waktu">Waktu :</label>
                                <input type="time" class="form-control" name="waktu" id="waktu" value="{{$p->waktu}}" required>
                            </div>
                            <div class="from-group mb-3">
                                <label for="topik">Topik :</label>
                                <input type="text" class="form-control" name="topik" id="topik" value="{{$p->topik}}" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <!-- END Modal Edit -->
    </div>


    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>