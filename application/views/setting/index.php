<?php $this->load->view('template/header.php'); ?>
<link href="<?= base_url('assets/') ?>vendor/zoom/css/zoom.css" rel="stylesheet" type="text/css">
<script src="<?= base_url('assets/') ?>vendor/zoom/js/zoom.js"></script>
<style>
.error {
    color: red;
}
</style>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" value="" name="nama">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Type</label>
                                <input type="text" class="form-control" value="" name="type" disabled>
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





<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Setting Website</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i>
                                    Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Data Setting Website</a></li>
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
                        <h5>List Data Setting Website</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="tabel"></div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>



        <script>
        $(document).ready(function() {
            tabel()
        });

        function tabel() {
            $.ajax({
                url: "<?= base_url(); ?>setting/tabel",
                method: "POST",
                beforeSend: function() {},
                success: function(data) {
                    $('.tabel').html(data)
                },
                error: function() {}
            });
        }

        function edit(id) {
            $('#formModal')[0].reset();
            $('[name=type_save]').val('edit');
            $('#exampleModal').modal('show');
            $('.modal-title').text('Ubah Data Setting');
            $('#btnSave').text('Ubah Data Setting');
            $.ajax({
                url: "<?= base_url('setting/edit/') ?>" + id,
                type: "POST",
                dataType: "JSON",
                beforeSend: function() {},
                success: function(data) {
                    $('[name=id]').val(data.id)
                    $('[name=nama]').val(data.nama)
                    $('[name=type]').val(data.type)
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
                },
                messages: {}
            });
            if (form.valid()) {
                var formData = new FormData($('#formModal')[0]);
                $.ajax({
                    url: '<?= base_url('setting/add') ?>',
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