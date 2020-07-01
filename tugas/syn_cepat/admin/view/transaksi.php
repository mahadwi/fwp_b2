<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Transaksi &nbsp;
    <a href="?page=add-transaksi" class="btn btn-info"><i class="fa fa-plus"></i> Tambah Data</a>
  </h1>
</div>
<?= (isset($_SESSION['notif'])) ? $_SESSION['notif'] : '';
unset($_SESSION['notif']) ?>
<div class="table-responsive">
  <table class="table table-striped table-sm" id="myTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Kode Transaksi</th>
        <th>Nama Pengirim</th>
        <th>Alamat Pengirim</th>
        <th>Kontak Pengirim</th>
        <th>Nama Penerima</th>
        <th>Alamat Penerima</th>
        <th>Kontak Penerima</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Berat Barang</th>
        <th>Kota Asal</th>
        <th>Kota Tujuan</th>
        <th>Layanan</th>
        <th>Harga Total</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ?>
      <?php foreach (dataTransaksi() as $pengirim) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $pengirim['kd_transaksi'] ?></td>
          <td><?= $pengirim['nama_pengirim'] ?></td>
          <td><?= $pengirim['alamatPengirim'] ?></td>
          <td><?= $pengirim['kontakPengirim'] ?></td>
          <td><?= $pengirim['nama_penerima'] ?></td>
          <td><?= $pengirim['alamatPenerima'] ?></td>
          <td><?= $pengirim['kontakPenerima'] ?></td>
          <td><?= $pengirim['nama_barang'] ?></td>
          <td><?= $pengirim['jenis_barang'] ?></td>
          <td><?= $pengirim['berat_barang'] ?></td>
          <td><?= $pengirim['kotaAsal'] ?></td>
          <td><?= $pengirim['kotaTujuan'] ?></td>
          <td><?= $pengirim['layanan'] ?></td>
          <td><?= $pengirim['harga'] ?></td>
          <td>
            <!-- TOMBOL EDIT -->
            <a href="?page=edit-transaksi&aksi=edit&id=<?= $pengirim['kd_transaksi'] ?>" title="Edit Data <?= $pengirim['kd_transaksi'] ?>"><i class="fa fa-edit text-info"></i></a>

            <!-- TOMBOL DELETE -->
            <a href="?page=act-transaksi&aksi=delete&id=<?= $pengirim['kd_transaksi'] ?>" onclick="return confirm('Yakin ingin menghapus data <?= $pengirim['kd_transaksi'] ?> ?') "><i class="fa fa-trash text-info"></i></a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>