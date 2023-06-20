<table class="table table-hover table-borderless" id="example">
    <tr>
        <td>Jumlah Warga membayar iuran warga</td>
        <th><?= $jumlah_warga_yang_bayar ?></th>
    </tr>
    <tr>
        <td>Jumlah Nominal Iuran Warga</td>
        <th><?= uang($jumlah_warga_nominal_yang_bayar) ?></th>
    </tr>
    <tr>
        <td>Jumlah Pengeluaran iuran warga</td>
        <th><?= $jumlah_pengeluaran ?></th>
    </tr>
    <tr>
        <td>Jumlah Nominal Pengeluaran Iuran Warga</td>
        <th><?= uang($jumlah_pengeluaran_nominal) ?></th>
    </tr>
    <tr>
        <td>Sisa</td>
        <th><?php $total = $jumlah_warga_nominal_yang_bayar - $jumlah_pengeluaran_nominal;
            echo uang($total); ?></th>
    </tr>


</table>


<script>

</script>