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
                                <label class="form-label">Nama Warga</label>
                                <select class="form-control" name="id_warga">
                                    <option value="">Pilih Nama Warga</option>
                                    <?php foreach ($nama_warga as $data) { ?>
                                        <option value="<?= $data->id ?>"><?= $data->nama ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Iuran Bulan</label>
                                <input type="month" class="form-control" value="" name="iuran_bulan">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nominal Iuran</label>
                                <input type="text" class="form-control" value="<?= uang($nominalIuran) ?>" name="nominal_iuran" disabled>
                            </div>


                            <div class="form-group status">
                                <label class="form-label">Status</label>
                                <select class="form-control" name="status">
                                    <option value="1">Bayar</option>
                                    <option value="2">Belum Bayar</option>
                                </select>
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
                            <h5 class="m-b-10">Iuran Warga</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i>
                                    Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Data Iuran Warga</a></li>
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
                        <h5>List Iuran Warga</h5>
                        <button type="button" class="float-right btn btn-primary btn btn-primary float-right mb-2" onclick="add()">
                            Tambah Data
                        </button>
                    </div>
                    <div class="card-body table-responsive">
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
                    url: "<?= base_url(); ?>iuran/tabel",
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
                $('.modal-title').text('Tambah Data Iuran Warga');
                $('#btnSave').text('Tambah Data Iuran Warga');
                $('.status').prop('hidden', true)
                $('[name=status]').val('1');
                $('[name=id_warga]').prop('readonly', false)

            }

            function edit(id) {
                $('#formModal')[0].reset();
                $('[name=type_save]').val('edit');
                $('#exampleModal').modal('show');
                $('.modal-title').text('Ubah Data Iuran Warga');
                $('#btnSave').text('Ubah Data Iuran Warga');
                $('.status').prop('hidden', false)
                $.ajax({
                    url: "<?= base_url('iuran/edit/') ?>" + id,
                    type: "POST",
                    dataType: "JSON",
                    beforeSend: function() {},
                    success: function(data) {
                        $('[name=id]').val(data.id)
                        $('[name=id_warga]').val(data.id_warga)
                        $('[name=id_warga]').prop('readonly', true)
                        $('[name=iuran_bulan]').val(data.iuran_bulan)
                        $('[name=status]').val(data.status)
                    },
                    error: function() {}
                });
            }

            function save() {
                var form = $('#formModal');
                form.validate({
                    rules: {
                        id_warga: {
                            required: true,
                        },
                        iuran_bulan: {
                            required: true,
                        },
                    },
                    messages: {}
                });
                if (form.valid()) {
                    var formData = new FormData($('#formModal')[0]);
                    $.ajax({
                        url: '<?= base_url('iuran/add') ?>',
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
                            } else if (data.status == 2) {
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Terjadi Kesalahan',
                                    text: 'Sudah membayar iuran pada bulan dan tahun tersebut'
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorwhrown) {}
                    });
                }
            }
        </script>
        <?php $this->load->view('template/footer.php'); ?>