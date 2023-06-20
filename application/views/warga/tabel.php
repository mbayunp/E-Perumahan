<?php $this->load->view('template/datatable.php'); ?>
<table class="table table-hover" id="example">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor KK</th>
            <th>Nama</th>
            <th>Nomor Telepon</th>
            <th>Nomor Rumah</th>
            <th>Alamat</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($warga as $data) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->nomor_kk ?></td>
                <td><?= $data->nama ?></td>
                <td><?= $data->nomor_telepon ?></td>
                <td><?= $data->nomor_rumah ?></td>
                <td><?= $data->alamat ?></td>
                <td><button class="btn <?= ($data->status_tinggal == '1' ? 'btn-primary' : 'btn-secondary') ?>"><?= ($data->status_tinggal == '1' ? 'Masih Jadi Warga' : 'Sudah Tidak Jadi Warga') ?></button>
                </td>
                <td><button class="btn btn-secondary" onclick="edit(<?= $data->id ?>)">Ubah</button></td>
            </tr>
        <?php } ?>
    </tbody>
</table>


<script>
    $(document).ready(function() {
        $('#example').DataTable();
    })
</script>