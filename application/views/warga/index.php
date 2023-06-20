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
                                <label class="form-label">Nomor Kartu Keluarga</label>
                                <input type="number" class="form-control" value="" name="nomor_kk" placeholder="contoh 458670932....">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nomor Nik KTP</label>
                                <input type="number" class="form-control" value="" name="nomor_nik_ktp" placeholder="contoh 458670932....">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" value="" name="nama">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" value="" name="nomor_telepon" placeholder="contoh 0857....">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nomor Rumah</label>
                                <input type="text" class="form-control" value="" name="nomor_rumah">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control" value="" name="alamat">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status Tinggal</label>
                                <select class="form-control" name="status_tinggal">
                                    <option value="">Pilih Status</option>
                                    <option value="1">Masih Jadi Warga</option>
                                    <option value="2">Sudah Tidak Jadi Warga</option>
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
                            <h5 class="m-b-10">Data Warga</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Data Warga</a></li>
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
                        <h5>List Data Warga</h5>
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
                    url: "<?= base_url(); ?>warga/tabel",
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
                $('.modal-title').text('Tambah Data Warga');
                $('#btnSave').text('Tambah Data Warga');

            }

            function edit(id) {
                $('#formModal')[0].reset();
                $('[name=type_save]').val('edit');
                $('#exampleModal').modal('show');
                $('.modal-title').text('Ubah Data Warga');
                $('#btnSave').text('Ubah Data Warga');
                $.ajax({
                    url: "<?= base_url('warga/edit/') ?>" + id,
                    type: "POST",
                    dataType: "JSON",
                    beforeSend: function() {},
                    success: function(data) {
                        $('[name=id]').val(data.id)
                        $('[name=nama]').val(data.nama)
                        $('[name=nomor_nik_ktp]').val(data.nomor_nik_ktp)
                        $('[name=nomor_kk]').val(data.nomor_kk)
                        $('[name=nomor_telepon]').val(data.nomor_telepon)
                        $('[name=nomor_rumah]').val(data.nomor_rumah)
                        $('[name=alamat]').val(data.alamat)
                        $('[name=status_tinggal]').val(data.status_tinggal)
                    },
                    error: function() {}
                });
            }

            function save() {
                var form = $('#formModal');
                form.validate({
                    rules: {
                        nama: {
                            required: true,
                        },
                        alamat: {
                            required: true,
                        },
                        nomor_nik_ktp: {
                            required: true,
                            number: true,
                        },
                        nomor_kk: {
                            required: true,
                            number: true,
                        },
                        nomor_telepon: {
                            required: true,
                            number: true,
                        },
                        nomor_rumah: {
                            required: true,
                        },
                        status_tinggal: {
                            required: true,
                            number: true
                        },
                    },
                    messages: {}
                });
                if (form.valid()) {
                    var formData = new FormData($('#formModal')[0]);
                    $.ajax({
                        url: '<?= base_url('warga/add') ?>',
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
        </script>
        <?php $this->load->view('template/footer.php'); ?>