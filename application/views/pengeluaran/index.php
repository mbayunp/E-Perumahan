<?php $this->load->view('template/header.php'); ?>
<?php $this->load->view('template/datatable.php'); ?>
<style>
    .error {
        color: red;
    }
</style>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form method="post" id="formModal" action="#" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="">
                            <input type="hidden" name="type_save" value="">
                            <div class="form-group">
                                <label class="form-label">Nama Pengeluaran</label>
                                <input type="text" class="form-control" value="" name="nama" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Keterangan Pengeluaran</label>
                                <input type="text" class="form-control" value="" name="keterangan" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nominal Pengeluaran</label>
                                <input type="text" class="form-control" value="" name="nominal" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tanggal Pengeluaran</label>
                                <input type="date" class="form-control" value="" name="tanggal_pengeluaran" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Sisa Budget Iuran Warga</label>
                                <input type="text" class="form-control" value="" name="sisa" placeholder="" readonly>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnClose" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Add Data </button>
            </div>
        </div>
    </div>
</div>



<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Pengeluaran</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i>
                                    Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Data Pengeluaran</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <h5>List Data Pengeluaran</h5>
                        <button type="button" class="float-right btn btn-primary btn btn-primary float-right mb-2" onclick="add()">
                            Tambah Data
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="tabel"></div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>

        <!-- [ Main Content ] end -->
        <script>
            $(document).ready(function() {
                tabel()
            });

            function tabel() {
                $.ajax({
                    url: "<?= base_url(); ?>pengeluaran/tabel",
                    method: "POST",
                    beforeSend: function() {},
                    success: function(data) {
                        $('.tabel').html(data)
                    },
                    error: function() {}
                });
            }

            function add() {
                $('#exampleModal').attr('hidden', false)
                $('#formModal')[0].reset();
                $('[name=type_save]').val('add');
                $('[name=id]').val('');
                $('#exampleModal').modal('show');
                $('.modal-title').text('Tambah Data Pengeluaran');
                $('#btnSave').text('Tambah Data Pengeluaran');
                cekNominal()
            }

            function edit(id) {
                $('#formModal')[0].reset();
                $('[name=type_save]').val('edit');
                $('#exampleModal').modal('show');
                $('.modal-title').text('Ubah Data Pengeluaran');
                $('#btnSave').text('Ubah Data Pengeluaran');
                cekNominal();
                $.ajax({
                    url: "<?= base_url('pengeluaran/edit/') ?>" + id,
                    type: "POST",
                    dataType: "JSON",
                    beforeSend: function() {},
                    success: function(data) {
                        $('[name=id]').val(data.id)
                        $('[name=nama]').val(data.nama)
                        $('[name=nominal]').val(data.nominal)
                        $('[name=keterangan]').val(data.keterangan)
                        $('[name=tanggal_pengeluaran]').val(data.tanggal_pengeluaran)
                    },
                    error: function() {}
                });
            }

            function save() {
                var nominalPengeluaran = $('[name=nominal]').val();
                var nominalIuran = $('[name=sisa]').val();
                if (nominalPengeluaran > nominalIuran) {
                    $('#exampleModal').modal('hide');
                    swal.fire({
                        icon: 'warning',
                        title: '',
                        text: 'Nominal Pengeluarn tidak boleh melebihi Sisa Budget'
                        // + data.nomor_item
                    });

                } else {
                    var form = $('#formModal');
                    form.validate({
                        rules: {
                            nama: {
                                required: true,
                            },
                            keterangan: {
                                required: true,
                            },
                            nominal: {
                                required: true,
                                number: true,
                            },
                            tanggal_pengeluaran: {
                                required: false,
                                date: true,

                            },
                        },
                        messages: {}
                    });
                    if (form.valid()) {
                        var formData = new FormData($('#formModal')[0]);
                        $.ajax({
                            url: '<?= base_url('pengeluaran/add') ?>',
                            type: "POST",
                            data: formData,
                            contentType: false,
                            processData: false,
                            dataType: "json",
                            success: function(data) {
                                $('#exampleModal').modal('hide');
                                if (data.status == true) {
                                    swal.fire({
                                        icon: 'success',
                                        title: 'Save Data',
                                        text: 'Saving Data '
                                        // + data.nomor_item
                                    });
                                    tabel();

                                } else if (data.status == false) {
                                    swal.fire({
                                        icon: 'warning',
                                        title: 'Terjadi Kesalahan',
                                        text: 'Harap Hubungi Admin'
                                    });
                                }
                            },
                            error: function(jqXHR, textStatus, errorwhrown) {}
                        });
                    }
                }

            }

            function cekNominal() {
                $.ajax({
                    url: "<?= base_url('pengeluaran/cekIuran') ?>",
                    type: "POST",
                    dataType: "JSON",
                    beforeSend: function() {},
                    success: function(data) {
                        $('[name=sisa]').val(data)
                    },
                    error: function() {}
                });
            }
        </script>
        <?php $this->load->view('template/footer.php'); ?>