<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body table-responsive">
                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModal">Tambah</button>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $item): ?>
                            <tr>
                                <td class="text-bold-500"><?= $item['nama']; ?></td>
                                <td><?= $item['nim']; ?></td>
                                <td class="d-flex gap-2">
                                    <div>
                                        <button onclick="updateMahasiswaId(event)" class="btn btn-warning btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-id="<?= $item['id']; ?>" data-nama="<?= $item['nama']; ?>"
                                            data-nim="<?= $item['nim']; ?>">Edit</button>
                                    </div>
                                    <form method="post" action="/flight-portalsia/dashboard-admin/delete-mahasiswa">
                                        <input type="hidden" name="id" value="<?= $item['id']; ?>">
                                        <button type="button" onclick="deleteMahasiswa(event)" class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Add Modal -->
    <div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form method="post" action="/flight-portalsia/dashboard-admin/add-mahasiswa" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Tambah Mahasiswa</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="basicInput">Nama</label>
                        <input name="nama" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">nim</label>
                        <input name="nim" type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-success ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tambah</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!--Update Modal -->
    <div class="modal fade text-left" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form method="post" action="/flight-portalsia/dashboard-admin/update-mahasiswa" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Perbarui Mahasiswa</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="mahasiswaId" type="hidden" name="id-mahasiswa">
                    <div class="form-group">
                        <label for="basicInput">Nama</label>
                        <input id="namaMahasiswaUpdate" name="nama" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">nim</label>
                        <input id="nimMahasiswaUpdate" name="nim" type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-success ms-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function updateMahasiswaId(event) {
        const id = event.target.getAttribute('data-id')
        const nama = event.target.getAttribute('data-nama')
        const nim = event.target.getAttribute('data-nim')

        document.getElementById('mahasiswaId').value = id
        document.getElementById('namaMahasiswaUpdate').value = nama
        document.getElementById('nimMahasiswaUpdate').value = nim
    }

    function deleteMahasiswa(event) {
        const isToDelete = confirm('hapus?')

        if (isToDelete) {
            event.target.parentElement.submit()
        }
    }
</script>