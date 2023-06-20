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
        <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

<title>Sistem Informasi Iuran Warga</title>

<link href="<?= base_url('assets/static/') ?>css/app.css" rel="stylesheet">
<link href="<?= base_url(
    'assets/'
) ?>js/sweetalert2.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<style>
    body {
        background-image: url("<?= base_url('assets/images/perum2.jpg') ?>");
        background-size: cover;
    }

    .start-button {
    display: flex;
    justify-content: center;
    }
    </style>

<body>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata(
        'notif'
    ) ?>"></div>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                    <div class="text-center mt-4">
                    <h1 class="lead" id="current-time">Waktu saat ini: </h1>
                        <h3 class="lead">
                        <b><h1 class="h1">SELAMAT DATANG</h1><b>
                            Sistem Informasi Perumahan Cipadung <b>RT 011 RW 01</b>
    </h3>
                    </div>



                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <div class="text-center">
                                    <p>
                                        Sistem ini memberikan informasi tentang iuran warga dan menyediakan fitur cetak
                                        bukti pembayaran. Silakan lanjutkan untuk melihat informasi dan melakukan cetak bukti pembayaran.
                                    </p>
                                </div>
                                <div class="mt-3 start-button">
                                    <a href="<?= base_url(
                                        'auth/cekcetak'
                                    ) ?>" class="btn btn-lg btn-success">MULAI</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">

                                    </div>
                                    <form action="<?= base_url() ?>auth/process" method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Username</label>
                                            <input class="form-control form-control-lg" name="user"
                                                placeholder="Enter your username" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="pasword"
                                                placeholder="Enter your password" />

                                        </div>
                                        <div class=" mt-3">
                                            <!-- <a href="index.html" class="btn btn-lg btn-primary">Sign in</a> -->
                                            <button type="submit" name="login"
                                                class="btn btn-lg btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</main>


<script src="<?= base_url(
    'assets/plugins/jquery/'
) ?>jquery.min.js"></script>


<script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
<script>
    function getCurrentTime() {
        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();
        var time
        time = hours + ":" + minutes + ":" + seconds;
return time;
}

function updateTime() {
        var currentTime = getCurrentTime();
        document.getElementById("current-time").innerText = "Waktu saat ini: " + currentTime;
    }

    setInterval(updateTime, 1000);
</script>
</body>
</html>
