<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-6">

            <?= $this->session->flashdata('message'); ?>
            <form action="<?= base_url('mahasiswa/edit'); ?>" method="post">

                <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" value='<?= $mahasiswa['id']; ?>'>
                    <label for="nrp">Nrp</label>
                    <input type="text" class="form-control" id="nrp" name="nrp" value='<?= $mahasiswa['nrp']; ?>'>
                    <?= form_error('nrp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $mahasiswa['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= $mahasiswa['email']; ?>">
                </div>
                <div class="form-group">
                    <label for="jurusan">jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $mahasiswa['jurusan']; ?>">
                </div>

                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">edit</button>
                </div>

            </form>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->