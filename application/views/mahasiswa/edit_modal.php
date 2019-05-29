<!-- Modal edit -->
<div class="modal fade" id="i<?= $mahasiswa['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="<?= base_url('mahasiswa/edit'); ?>" method="post">
                <input type="hidden" class="form-control" id="idx" name="idx" value=<?= $mahasiswa['id']; ?>>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nrp">nrp</label>
                        <input type="text" class="form-control" id="nrp" name="nrp" placeholder="nrp Name" value=<?= $mahasiswa['nrp']; ?>>

                    </div>

                    <div class="form-group">
                        <label for="nama">nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="nama Name" value=<?= $mahasiswa['nama']; ?> required>

                    </div>
                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email Name" value=<?= $mahasiswa['email']; ?> required>

                    </div>
                    <div class="form-group">
                        <label for="jurusan">jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="jurusan Name" value=<?= $mahasiswa['jurusan']; ?> required>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>