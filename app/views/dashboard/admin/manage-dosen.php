<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body table-responsive">
                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModal">Tambah</button>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NID</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dosens as $dosen): ?>
                            <tr>
                                <td class="text-bold-500"><?= $dosen['nama']; ?></td>
                                <td><?= $dosen['nidn']; ?></td>
                                <td class="d-flex gap-2">
                                    <div>
                                        <button onclick="updateDosenId(event)" class="btn btn-warning btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-id="<?= $dosen['id']; ?>"
                                            data-nama="<?= $dosen['nama']; ?>"
                                            data-nidn="<?= $dosen['nidn']; ?>"
                                            >Edit</button>
                                    </div>
                                    <form method="post" action="/flight-portalsia/dashboard-admin/delete-dosen">
                                        <input type="hidden" name="id" value="<?= $dosen['id']; ?>">
                                        <button type="button" onclick="deleteDosen(event)" class="btn btn-danger btn-sm">
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
            <form method="post" action="/flight-portalsia/dashboard-admin/add-dosen" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Tambah Dosen</h5>
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
                        <label for="basicInput">NIDN</label>
                        <input name="nidn" type="text" class="form-control">
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
            <form method="post" action="/flight-portalsia/dashboard-admin/update-dosen" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Perbarui Dosen</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="dosenId" type="hidden" name="id-dosen">
                    <div class="form-group">
                        <label for="basicInput">Nama</label>
                        <input id="namaDosenUpdate" name="nama" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="basicInput">NIDN</label>
                        <input id="nidnDosenUpdate" name="nidn" type="text" class="form-control">
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
    function updateDosenId(event) {
        const id = event.target.getAttribute('data-id')
        const nama = event.target.getAttribute('data-nama')
        const nidn = event.target.getAttribute('data-nidn')

        document.getElementById('dosenId').value = id
        document.getElementById('namaDosenUpdate').value = nama
        document.getElementById('nidnDosenUpdate').value = nidn
    }

    function deleteDosen(event) {
        const isToDelete = confirm('hapus?')

        if (isToDelete) {
            event.target.parentElement.submit()
        }
    }
</script>