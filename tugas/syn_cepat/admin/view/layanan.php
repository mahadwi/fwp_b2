<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Layanan <a href="?page=add-layanan" class="btn btn-info"><i class="fa fa-plus"></i>Tambah Data</a>
  </h1>
</div>
<?= (isset($_SESSION['notif'])) ? $_SESSION['notif'] : '';
unset($_SESSION['notif']) ?>
<div class="table-responsive">
  <table class="table table-striped table-sm" id="myTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Kode Layanan</th>
        <th>Layanan</th>
        <th>Harga</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ?>
      <?php foreach (dataLayanan() as $layanan) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $layanan['kd_layanan'] ?></td>
          <td><?= $layanan['layanan'] ?></td>
          <td>Rp. <?= number_format($layanan['harga'], 0, '.', '.') ?> </td>
          <td><?= $layanan['keterangan'] ?></td>
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