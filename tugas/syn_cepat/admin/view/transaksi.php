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
      <?php foreach (dataTransaksiPengirim() as $pengirim) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $pengirim['kd_transaksi'] ?></td>
          <td><?= $pengirim['nama_pengirim'] ?></td>
          <td><?= $pengirim['alamat'] ?></td>
          <td><?= $pengirim['kontak'] ?></td>
          <td><?= $pengirim['nama_penerima'] ?></td>
          <td><?= $pengirim['alamat'] ?></td>
          <td><?= $pengirim['kontak'] ?></td>
          <td>
            <!-- TOMBOL EDIT -->
            <a href="?page=edit-layanan&aksi=edit&id=<?= $layanan['kd_layanan'] ?>" title="Edit Data <?= $layanan['kd_layanan'] ?>"><i class="fa fa-edit text-info"></i></a>

            <!-- TOMBOL DELETE -->
            <a href="?page=act-layanan&aksi=delete&id=<?= $layanan['kd_layanan'] ?>" onclick="return confirm('Yakin ingin menghapus data <?= $layanan['kd_layanan'] ?> ?') "><i class="fa fa-trash text-info"></i></a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>