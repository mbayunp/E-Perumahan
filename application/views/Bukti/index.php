<?php $this->load->view('template/header.php'); ?>
<?php $this->load->view('template/datatable.php'); ?>
<style>
    .error {
        color: red;
    }
</style>

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Bukti Pembayaran</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i>
                                    Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Bukti Pembayaran</a></li>
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
                        <h5>Bukti Pembayaran</h5>
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
                    url: "<?= base_url() ?>Bukti/tabel",
                    method: "POST",
                    beforeSend: function() {},
                    success: function(data) {
                        $('.tabel').html(data)
                    },
                    error: function() {}
                });
            }
        </script>
        <?php $this->load->view('template/footer.php'); ?>
