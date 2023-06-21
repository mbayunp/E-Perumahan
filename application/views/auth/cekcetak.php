<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <title>Sistem Informasi Perumahan villa Indah Ciwidey</title>

    <link href="<?= base_url('assets/static/') ?>css/app.css" rel="stylesheet">
    <link href="<?= base_url('assets/') ?>js/sweetalert2.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
    .whatsapp-logo {
        width: 20px; /* Sesuaikan ukuran gambar yang diinginkan */
        height: 20px; /* Sesuaikan ukuran gambar yang diinginkan */
        margin-right: 5px; /* Sesuaikan margin kanan jika diperlukan */
        vertical-align: middle; /* Untuk mengatur penempatan vertikal */
    }

    body {
        background-image: url("<?= base_url('assets/images/perum2.jpg') ?>");
        background-size: cover;
    }
</style>

</head>

<body>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('notif'); ?>"></div>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Sistem Informasi Perumahan Villa Indah Ciwidey</h1>
                            <p class="lead">
                                Cetak Bukti Pembayaran Iuran Bulanan <b>RT 03 RW 03</b>
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        Silahkan masukan nomor Nomor Kartu Keluarga dan Pilih Bulan yang akan dicetak
                                    </div>
                                    <form action="<?= base_url() ?>auth/html" method="post">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Nomor Kartu keluarga"
                                                name="no_kk">
                                            <div class="input-group-append">
                                                <button type="button" class="btn btn-info"
                                                    onclick="cekPembayaran()">Cek Pembayaran</button>
                                            </div>
                                        </div>
                                        <div id="cekPembayaran"></div>
                                        <div class="mt-3">
                                            <button type="submit" class="btn mr-2 ml-2 btn-lg btn-success"
                                                style="float:right">Cetak Bukti Pembayaran</button>
                                            <a href="<?= base_url() ?>"
                                                class="btn mr-2 ml-2 btn-lg btn-primary" style="float:left">Kembali</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-4">
    <div class="card-body">
        <div class="text-center">
            <h5>Hubungi Narahubung melalui WhatsApp</h5>
            <p>
                <a href="https://api.whatsapp.com/send?phone=0895422683275" target="_blank" class="btn btn-success btn-lg">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/2044px-WhatsApp.svg.png" alt="WhatsApp Logo" class="whatsapp-logo">
                    Hubungi Kami
                </a>
            </p>
        </div>
    </div>
</div>


                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="<?= base_url('assets/static/') ?>js/app.js"></script>
    <script src="<?= base_url('assets/plugins/jquery/') ?>jquery.min.js"></script>

    <script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
    <script>
        const flashData = $('.flash-data').data('flashdata');
        if (flashData) {
            Swal.fire(
                flashData, '',
                'success'
            )
        }

        function cekPembayaran() {
            var no_kk = $('[name=no_kk]').val();
            $.ajax({
                url: "<?= base_url('auth/getDataPembayaran') ?>",
                type: "POST",
                data: {
                    no_kk
                },
                dataType: "JSON",
                beforeSend: function () { },
                success: function (data) {
                    if (data.status == false) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Nomor kartu keluarga tersebut tidak ada',
                            text: '',
                        })
                    } else if (data.status == true) {

                        Swal.fire({
                            icon: 'success',
                            title: 'Silahkan pilih Tahun dan bulan pembayaran',
                            text: '',
                        });
                        $('#cekPembayaran').html(data.html);
                    }
                },
                error: function () { }
            });
        }
    </script>
</body>

</html>
