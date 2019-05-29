<link href="https://vjs.zencdn.net/7.4.1/video-js.css" rel="stylesheet">

<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><?= $title; ?></h1>


    <div class="row">

        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?></div>
            <?php endif; ?>
            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3 btn-sm" data-toggle="modal" data-target="#exampleModal">Add</a>



            <table id="myTable" class="table table-hover">
                <thead>
                    <tr>
                        <th scope=" col">#</th>
                        <th scope="col">Nrp</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Video</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($mahasiswa as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['nrp']; ?></td>
                            <td><?= $sm['nama']; ?></td>
                            <td><?= $sm['email']; ?></td>
                            <td><?= $sm['jurusan']; ?></td>
                            <td><img src="<?= base_url('assets'); ?>/img/mahasiswa/<?= $sm["image"]; ?>" width="30px" height="30px"></td>


                            <td>





                            </td>



                            <td>
                                <a href="<?= base_url(); ?>mahasiswa/edit/<?= $sm['id']; ?>" class=" badge badge-success">Edit</a>



                                <a href="#delete_<?= $sm['id']; ?>" class="badge badge-danger" data-toggle='modal'>Delete</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>






            <script src='https://vjs.zencdn.net/7.4.1/video.js'></script>





        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Button trigger modal -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Sub Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('mahasiswa/tambah'); ?>

            <div class="modal-body">
                <div class="form-group">
                    <label for="nrp">nrp</label>
                    <input type="text" class="form-control" id="nrp" name="nrp" required>
                </div>

                <div class="form-group">
                    <label for="nama">nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="jurusan">jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" required>
                </div>

                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">

                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php foreach ($mahasiswa as $x) : ?>
    <!-- Delete -->
    <div class="modal fade" id="delete_<?= $x['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p class="text-center">Are you sure you want to Delete</p>
                    <h2 class="text-center"><?= $x['nrp'] . ' ' . $x['nama']; ?></h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>

                    <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $x['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
                </div>

            </div>
        </div>
    </div>
<?php endforeach; ?>