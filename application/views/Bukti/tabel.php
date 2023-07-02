<?php $this->load->view('template/datatable.php'); ?>
<table class="table table-hover" id="example">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Warga</th>
            <th>Lihat bukti</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($bukti as $data) {

            $query = "SELECT nama, nomor_telepon FROM tbl_warga WHERE id='$data->id_warga'";
            $result = $this->db->query($query)->row();
            $namaWarga = $result->nama;
            $gambar = $data->gambar;
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $namaWarga ?></td>
                <td>
                    <button class="btn btn-success" onclick="lihatBukti('<?= rawurlencode(
                        $gambar
                    ) ?>')">lihat</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    function lihatBukti(namaFile) {
        var url = "<?= base_url('./assets/bukti/') ?>" + namaFile;

        // Buka jendela baru untuk menampilkan gambar
        window.open(url, "_blank");
    }
</script>
