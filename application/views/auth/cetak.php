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
        <h4>SISTEM INFORMASI PEMBAYARAN IURAN KAS WARGA <br> RT 011 RW 01 KELURAHAN PEGANGSAAN KECAMATAN MENTENG JAKARTA
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
        <p>Bukti cetak ini sah, dengan didownload diaplikasi sistem informasi iuran warga</p>
        <p>Kontak Sekretaris RT: Susanto 085770893312</p>


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