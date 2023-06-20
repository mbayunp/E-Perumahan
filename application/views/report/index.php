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
                            <h5 class="m-b-10">Report Iuran dan Pengeluaran RT</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i>
                                    Dashboard</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#!">Report Iuran dan Pengeluaran RT</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-md-6">
                <div class="card">

                    <div class="card-header">
                        <h5>Report</h5>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Filter Bulan Tahun</label>
                                <input type="month" class="form-control" value="" name="dariBulan">
                                <input type="month" class="form-control" value="" name="keBulan">
                                <br>
                                <button class="btn btn-primary" onclick="filter()" type="button">Filter</button>
                            </div>
                        </div>



                    </div>
                    <div class="card-body">
                        <div class="tabel "></div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>

        <!-- [ Main Content ] end -->
        <script>
        // $(document).ready(function() {
        //     tabel()
        // });

        function filter() {
            var tanggalAwal = $('[name=dariBulan]').val();
            var tanggalAkhir = $('[name=keBulan]').val();
            if (tanggalAwal != '' || tanggalAkhir != '') {
                $.ajax({
                    url: "<?= base_url(); ?>report/tabel",
                    method: "POST",
                    data: {
                        tanggalAwal,
                        tanggalAkhir
                    },
                    beforeSend: function() {},
                    success: function(data) {
                        $('.tabel').html(data)
                    },
                    error: function() {}
                });
            } else {
                alert('Mohon untuk mengisi Tanggal Filter')
            }

        }
        </script>
        <?php $this->load->view('template/footer.php'); ?>