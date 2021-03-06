<style>
    th {
        font-size: 13px;
    }

    td {
        font-size: 12px;
    }

    #jumlah {
        font-size: 20px;
    }
</style>



<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>

        <div class="card-body">


            <div class="row">
                <div class="col-lg-12">


                    <form action="<?= base_url('in/add_form'); ?>" method="post" id="form_material">
                        <div class="form-row">

                            <div class="col-md-3 mb-1">
                                <label for="kode_in">kode in</label>
                                <input type="text" class="form-control form-control-sm" id="kode_in" name="kode_in" value="<?= $kodeotomatis ?>" placeholder="" required readonly>
                            </div>

                            <div class="col-md-3 mb-1">
                                <label for="dates">Date</label>
                                <input type="text" id="dp1" class="form-control form-control-sm" name="dates" placeholder="DD/MM/YYY" required>
                            </div>



                            <div class="col-md-3 mb-1">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control  form-control-sm" id="keterangan" name="keterangan" placeholder="" required>

                            </div>






                            <div class="col-lg-12">
                                <hr>
                            </div>


                        </div>
                        <div class="row">


                            <div class="col-md-4">
                                <label for="qty">Kode Barang</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm tb-f" name="kode_barang" id="kode_barang" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary btn-sm" type="button" onclick="cari_data()">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <br>


                                <input type="text" class="form-control  form-control-sm tb-f" id="nama_barang" name="nama_barang" placeholder="" readonly>

                            </div>



                            <div class="col-md-4">
                                <label for="qty">Kode Supplier</label>
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm tb-f" name="kode_supplier" id="kode_supplier" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary btn-sm" type="button" onclick="cari_datas()">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <br>

                                <input type="text" class="form-control  form-control-sm tb-f" id="nama_supplier" name="nama_supplier" placeholder="" readonly>

                            </div>


                            <div class="col-md-2">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control form-control-sm tb-f" min="1" max="999999" rows="10">


                            </div>
                        </div>

                        <input type="hidden" name="row_id" id="hidden_row_id" />
                        <input type="hidden" class="form-control  form-control-sm" id="tabels" name="tabels">




                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <hr>



                        <div align="left">
                            <button type="button" name="insert" id="insert" class="btn btn-success btn-sm">Insert</button>


                        </div>

                        <br>

                        <?= form_error('tabels', '<small class="text-danger pl-4">', '</small>'); ?>
                        <table class="table table-bordered table-striped" id="table">
                            <thead>
                                <tr>

                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kode supplier</th>
                                    <th>Nama Supplier</th>
                                    <th>Jumlah</th>
                                    <th>Action</th>


                                </tr>
                            </thead>

                        </table>

                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm save" id="save">Save</button>
                        <a href="<?= base_url('in'); ?>" class="btn btn-danger btn-sm">Back</a>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<script>
    var rIndex,
        table = document.getElementById("table");
    var count = 0;
    // check the empty input
    function checkEmptyInput() {
        var isEmpty = false,
            fname = document.getElementById("kode_barang").value,
            lname = document.getElementById("kode_supplier").value,
            age = document.getElementById("jumlah").value;

        if (fname === "") {
            alert("kode Connot Be Empty");
            isEmpty = true;
        } else if (lname === "") {
            alert("kode sup Connot Be Empty");
            isEmpty = true;
        } else if (age === "") {
            alert("jumlah Connot Be Empty");
            isEmpty = true;
        }
        return isEmpty;
    }



    $('#insert').click(function() {
        var kd_brg = $('#kode_barang').val();
        var nama_brg = $('#nama_barang').val();
        var kd_sup = $('#kode_supplier').val();
        var nama_sup = $('#nama_supplier').val();
        var jumlah = $('#jumlah').val();
        var kodes = $('#kode_barang').val();

        if (!checkEmptyInput()) {

            if ($('#insert').text() == 'Insert') {

                $('#tabels').val(kodes);
                count = count + 1;
                output = '<tr id="row_' + count + '">';
                output += '<td>' + kd_brg + ' <input type="hidden" name="hidden_kd_brg[]" id="kd_brg' + count + '" class="kd_brg" value="' + kd_brg + '" /></td>';
                output += '<td>' + nama_brg + ' <input type="hidden" name="hidden_nama_brg[]" id="nama_brg' + count + '" value="' + nama_brg + '" /></td>';
                output += '<td>' + kd_sup + ' <input type="hidden" name="hidden_kd_sup[]" id="kd_sup' + count + '" value="' + kd_sup + '" /></td>';
                output += '<td>' + nama_sup + ' <input type="hidden" name="hidden_nama_sup[]" id="nama_sup' + count + '" value="' + nama_sup + '" /></td>';
                output += '<td>' + jumlah + ' <input type="hidden" name="hidden_jumlah[]" id="jumlah' + count + '" value="' + jumlah + '" /></td>';
                output += '<td><button type="button"  class="btn btn-danger btn-sm remove_details"  id="' + count + '">Remove</button></td>';
                output += '</tr>';
                $('#table').append(output);
            } else {
                var row_id = $('#hidden_row_id').val();
                output += '<td>' + kd_brg + ' <input type="hidden" name="hidden_kd_brg[]" id="kd_brg' + row_id + '" class="kd_brg" value="' + kd_brg + '" /></td>';
                output += '<td>' + nama_brg + ' <input type="hidden" name="hidden_nama_brg[]" id="nama_brg' + row_id + '" value="' + nama_brg + '" /></td>';
                output += '<td>' + kd_sup + ' <input type="hidden" name="hidden_kd_sup[]" id="kd_sup' + row_id + '" value="' + kd_sup + '" /></td>';
                output += '<td>' + nama_sup + ' <input type="hidden" name="hidden_nama_sup[]" id="nama_sup' + row_id + '" value="' + nama_sup + '" /></td>';
                output += '<td>' + jumlah + ' <input type="hidden" name="hidden_jumlah[]" id="jumlah' + row_id + '" value="' + jumlah + '" /></td>';
                output += '<td><button type="button"  class="btn btn-danger btn-sm remove_details"  id="' + row_id + '">Remove</button></td>';
                $('#row_' + row_id + '').html(output);
            }
        }
        $('.tb-f').val('');
    });





    $(document).on('click', '.remove_details', function() {
        var row_id = $(this).attr("id");

        if (confirm("Are you sure you want to remove this row data?")) {
            $('#row_' + row_id + '').remove();
        } else {
            return false;
        }
    });

    $("#simpan").click(function(){
            var kodein=$("#kode_in").val();
            var tanggal=$("#dates").val();
            var keterangan=$("#keterangan").val();
          
            if (nis=="") {
                alert("Pilih Nis Siswa");
                return false;
            }else if (jumlah==0) {
                alert("pilih buku yang akan di tanggal");
                return false;
            }else{
                $.ajax({
                    url:"<?php echo site_url('peminjaman/sukses');?>",
                    type:"POST",
                    data:"kode_in="+kodein+"tanggal="+pinjam+"&kembali="+keterangan+"&nis="+nis+"&jumlah="+jumlah,
                    cache:false,
                    success:function(html){
                        alert("Transaksi Peminjaman berhasil");
                        location.reload();
                    }
                })
            }
            
        })
</script>





<script type="text/javascript">
    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url(); ?>';


    $(document).ready(function() {
        $('#tablex').DataTable();
        responsive: true




    });

    $(document).ready(function() {
        $('#tables').DataTable();
        responsive: true
    });


    function kd_otomatis() {
        $.ajax({
            url: "<?php echo site_url('in/kode_otomatis') ?>/",
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="kode_in"]').val(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });

    }

    function cari_data() {
        $('#modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Search data'); // Set Title to Bootstrap modal title
    }

    function cari_datas() {
        $('#modal_forms').modal('show'); // show bootstrap modal
        $('.modal-title').text('Search data'); // Set Title to Bootstrap modal title
    }
    //            jika dipilih, nim akan masuk ke input dan modal di tutup
    $(document).on('click', '.pilih', function(e) {

        document.getElementById("kode_barang").value = $(this).attr('data-kode');
        document.getElementById("nama_barang").value = $(this).attr('data-nama');


        $('#modal_form').modal('hide');
    });



    $(document).on('click', '.pilihs', function(e) {
        document.getElementById("kode_supplier").value = $(this).attr('data-kode');

        document.getElementById("nama_supplier").value = $(this).attr('data-nama');

        $('#modal_forms').modal('hide');
    });


    $('#dp1').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,


    });



    function edit_data(id) {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('buyer/edit_data') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {

                $('[name="id"]').val(data.id);
                $('[name="kode"]').val(data.kode);
                $('[name="buyer"]').val(data.buyer);



                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('.modal-title').text('Edit Data'); // Set title to Bootstrap modal title $('#photo-preview').show(); // show photo preview modal



            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error get data from ajax');
            }
        });
    }


    function reload_table() {
        table.ajax.reload(null, false); //reload datatable ajax 
    }




    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable 
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('buyer/add_data') ?>";
        } else {
            url = "<?php echo site_url('buyer/update_data') ?>";
        }

        // ajax adding data to database

        var formData = new FormData($('#form')[0]);
        $.ajax({
            url: url,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "JSON",
            success: function(data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 


            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable 

            }
        });
    }

    function delete_data(id) {
        if (confirm('Are you sure delete this data?')) {
            // ajax delete data to database
            $.ajax({
                url: "<?php echo site_url('buyer/delete_datax') ?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });

        }
    }
</script>







<!-- Modal -->
<div class="modal fade" id="modal_form" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <div class="table-responsive">
                        <table id="tablex" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jenis</th>
                                    <th>Merk</th>
                                    <th>warna</th>
                                    <th>Satuan</th>
                                    <th>Keterangan</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($item as $sm) : ?>
                                    <tr class="pilih" data-kode="<?= $sm['kode_barang'] ?>" data-nama="<?= $sm['nama_barang'] ?>">
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['kode_barang']; ?></td>
                                        <td><?= $sm['nama_barang']; ?></td>
                                        <td><?= $sm['jenis']; ?></td>
                                        <td><?= $sm['merk']; ?></td>
                                        <td><?= $sm['warna']; ?></td>
                                        <td><?= $sm['satuan']; ?></td>
                                        <td><?= $sm['keterangan']; ?></td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>










<!-- Modal -->
<div class="modal fade" id="modal_forms" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body forms">
                <form action="#" id="form" class="form-horizontal">
                    <div class="table-responsive">
                        <table id="tables" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Telp</th>


                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($supplier as $sm) : ?>
                                    <tr class="pilihs" data-kode="<?= $sm['kode_supplier'] ?>" data-nama="<?= $sm['nama'] ?>">
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['kode_supplier']; ?></td>
                                        <td><?= $sm['nama']; ?></td>
                                        <td><?= $sm['alamat']; ?></td>
                                        <td><?= $sm['telp']; ?></td>


                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>

                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>