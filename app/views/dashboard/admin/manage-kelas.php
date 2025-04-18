<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body table-responsive">
                <button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addModal">Tambah</button>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Matakuliah</th>
                            <th>Jurusan</th>
                            <th>Semester</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kelas as $item): ?>
                            <tr>
                                <td class="text-bold-500"><?= $item['kelas']; ?></td>
                                <td class="text-bold-500"><?= $item['matakuliah']; ?></td>
                                <td class="text-bold-500"><?= $item['jurusan']; ?></td>
                                <td class="text-bold-500"><?= $item['semester']; ?></td>
                                <td class="d-flex gap-2">
                                    <div>
                                        <button onclick="updateMatakuliahId(event)" class="btn btn-warning btn-sm"
                                            data-bs-toggle="modal" data-bs-target="#updateModal"
                                            data-id="<?= $item['matakuliah_id']; ?>"
                                            data-matakuliah="<?= $item['matakuliah']; ?>"
                                            data-jurusan_id="<?= $item['jurusan_id']; ?>"
                                            data-semester_id="<?= $item['semester_id']; ?>">
                                            Edit
                                        </button>
                                    </div>
                                    <form method="post" action="/flight-portalsia/dashboard-admin/delete-matakuliah">
                                        <input type="hidden" name="id" value="<?= $item['matakuliah_id']; ?>">
                                        <button type="button" onclick="deleteJurusan(event)" class="btn btn-danger btn-sm">
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
            <form method="post" action="/flight-portalsia/dashboard-admin/add-kelas" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Tambah Kelas</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="basicInput">Matakuliah</label>
                        <select name="matakuliah_id" class="form-select">
                            <?php foreach ($matakuliah as $item): ?>
                                <option value="<?= $item['matakuliah_id']; ?>"><?= $item['matakuliah']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Jurusan</label>
                        <select name="jurusan_id" class="form-select">
                            <?php foreach ($jurusan as $item): ?>
                                <option value="<?= $item['id']; ?>"><?= $item['jurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Semester</label>
                        <select name="semester_id" class="form-select">
                            <?php foreach ($semester as $item): ?>
                                <option value="<?= $item['id']; ?>"><?= $item['semester']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
            <form method="post" action="/flight-portalsia/dashboard-admin/update-matakuliah" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Perbarui Matakuliah</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="matakuliahId" type="hidden" name="id-matakuliah">
                    <div class="form-group">
                        <label for="basicInput">Matakuliah</label>
                        <input id="matakuliahUpdate" name="matakuliah" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Jurusan</label>
                        <select name="jurusan_id" class="form-select">
                            <?php foreach ($jurusan as $item): ?>
                                <option value="<?= $item['id']; ?>"><?= $item['jurusan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Semester</label>
                        <select name="semester_id" class="form-select">
                            <?php foreach ($semester as $item): ?>
                                <option value="<?= $item['id']; ?>"><?= $item['semester']; ?></option>
                            <?php endforeach; ?>
                        </select>
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
    function updateMatakuliahId(event) {
        const id = event.target.getAttribute('data-id')
        const matakuliah = event.target.getAttribute('data-matakuliah')
        const jurusan_id = event.target.getAttribute('data-jurusan_id')
        const semester_id = event.target.getAttribute('data-semester_id')

        document.getElementById('matakuliahId').value = id
        document.getElementById('matakuliahUpdate').value = matakuliah

        // set selected jurusan
        const updateModal = document.getElementById('updateModal');
        const jurusanSelect = updateModal.querySelector('select[name="jurusan_id"]');
        jurusanSelect.value = jurusan_id;

        // set selected semester
        const semesterSelect = updateModal.querySelector('select[name="semester_id"]');
        semesterSelect.value = semester_id;
    }

    function deleteJurusan(event) {
        const isToDelete = confirm('hapus?')

        if (isToDelete) {
            event.target.parentElement.submit()
        }
    }
</script>