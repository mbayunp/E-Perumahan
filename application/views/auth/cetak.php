<!DOCTYPE html>

<head>
    <title></title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            /* border: 1px solid; */
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }
    </style>

</head>

<body>
    <div id="halaman" style="border: 10px solid grey;">
        <table width="100%">
        </table>
        <?php $iuran_bulan = $row->iuran_bulan;
        $bulan = bulan(substr($iuran_bulan, 5));
        $tahun = substr($iuran_bulan, 0, 4);
        ?>
        <h4>SISTEM INFORMASI PEMBAYARAN IURAN PERUMAHAN VILLA INDAH CIWIDEY<br> RT 03 RW 03 DESA PASIRJAMBU KEC. PASIRJAMBU
        </h4>
        <br>
        <p style="margin-top:-30px;margin-bottom:-30px;">
            ------------------------------------------------------------------------------------------------------------------------
        </p>
        <br>
        <h5>Bukti Cetak Pembayaran Iuran Bulan <?= $bulan ?> Tahun <?= $tahun ?> </h5>

        <table>
            <tr>
                <td style="width: 30%;">Nama</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?= $row->nama ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Nominal</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?= $row->nominal_iuran ?></td>
            </tr>
            <tr>
                <td style="width: 30%;">Tanggal Bayar</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;"><?= $row->tanggal_bayar ?></td>
            </tr>
        </table>
        <br>
        <p>Bukti cetak ini sah, dengan didownload di aplikasi sistem informasi iuran warga Perumahan Villa Indah Ciwidey</p>
        <p>Narahubung : Indah 0895-4226-83275</p>


    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            window.print();
            setTimeout(function() {
                window.close();
            }, 20000);
        });
    </script>
</body>

</html>