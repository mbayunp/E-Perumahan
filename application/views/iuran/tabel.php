<?php $this->load->view('template/datatable.php'); ?>
<table class="table table-hover" id="example">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Warga</th>
            <th>Tanggal Iuran</th>
            <th>Iuran Bulan</th>
            <th>Nominal Iuran</th>
            <th>Status</th>
            <th>Action</th>
            <th>Tagih</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($iuran as $data) {

            $query = "SELECT nama, nomor_telepon FROM tbl_warga WHERE id='$data->id_warga'";
            $result = $this->db->query($query)->row();
            $namaWarga = $result->nama;
            $nomorTelepon = $result->nomor_telepon;
            ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $namaWarga ?></td>
                <td><?= $data->tanggal_bayar ?></td>
                <td><?= $data->iuran_bulan ?></td>
                <td><?= $data->nominal_iuran ?></td>
                <td>
                    <button class="btn <?= $data->status == '1'
                        ? 'btn-primary'
                        : 'btn-secondary' ?>">
                        <?= $data->status == '1'
                            ? 'Sudah Bayar'
                            : 'Belum Bayar' ?>
                    </button>
                </td>
                <td>
                    <button class="btn btn-secondary" onclick="edit(<?= $data->id ?>)">Ubah</button>
                </td>
                <td>
                    <button class="btn btn-success" onclick="tagih('<?= $nomorTelepon ?>')">Tagih</button>
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

    function tagih(nomorTelepon) {
  var url = "https://wa.me/" + nomorTelepon + "?text=" + encodeURIComponent("pembayaran anda bulan ini sudah jatuh tempo segera hubungi admin");

  // Buka jendela baru ke URL WhatsApp
  window.location.href = url;
}

</script>
