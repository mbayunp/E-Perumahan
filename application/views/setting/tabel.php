<?php $this->load->view('template/datatable.php'); ?>
<table class="table table-hover" id="example">
    <thead>
        <tr>
            <th>No</th>
            <th>Action</th>
            <th>Nama</th>
            <th>Type</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($setting as $data) {
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><button class="btn btn-secondary" onclick="edit(<?= $data->id ?>)">Ubah</button></td>
            <td><?= $data->nama ?></td>
            <td><?= $data->type ?></td>
            <td><?= $data->upddate ?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>



<script>
$(document).ready(function() {
    $('#example').DataTable();
})
</script>