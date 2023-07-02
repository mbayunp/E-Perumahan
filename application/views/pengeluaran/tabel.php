<?php $this->load->view('template/datatable.php'); ?>
<table class="table table-hover" id="example">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pengeluaran</th>
            <th>Keterangan Pengeluaran</th>
            <th>Harga satuan</th>
            <th>Tanggal Pengeluaran</th>
            <th>Jumlah</th>
            <th>nominal harga</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($pengeluaran as $data) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->nama ?></td>
                <td><?= $data->keterangan ?></td>
                <td><?= uang($data->nominal) ?></td>
                <td><?= $data->tanggal_pengeluaran ?></td>
                <td><?= $data->jumlah ?></td>
                <td><?= $data->harga ?></td>
                <td><button class="btn btn-secondary" onclick="edit(<?= $data->id ?>)">Ubah</button></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    })
</script>