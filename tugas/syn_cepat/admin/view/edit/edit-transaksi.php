<?php
$data = dataTransaksiById($_GET['id']);
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Transaksi </h1>
</div>

<form action="?page=act-transaksi" method="POST">
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="kd-transaksi">Kode Transaksi</label>
        <input type="text" name="kdTransaksi" class="form-control" value="<?= $data['kd_transaksi'] ?>" readonly>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="namaPengirim">Nama Pengirim</label>
        <input type="text" name="namaPengirim" class="form-control" value="<?= $data['nama_pengirim'] ?>">
      </div>
      <div class="form-group">
        <input type="text" name="kontakPengirim" class="form-control" placeholder="Kontak Pengirim" value="<?= $data['kontakPengirim'] ?>">
      </div>
    </div>
    <div class="col-md-6">
      <label for="alamatPengirim">Alamat Pengirim</label>
      <textarea name="alamatPengirim" id="alamatPengirim" rows="3" class="form-control"><?= $data['alamatPengirim'] ?></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="namaPenerima">Nama Penerima</label>
        <input type="text" name="namaPenerima" class="form-control" value="<?= $data['nama_penerima'] ?>">
      </div>
      <div class="form-group">
        <input type="text" name="kontakPenerima" class="form-control" placeholder="Kontak Penerima" value="<?= $data['kontakPenerima'] ?>">
      </div>
    </div>
    <div class="col-md-6">
      <label for="alamatPenerima">Alamat Penerima</label>
      <textarea name="alamatPenerima" id="alamatPenerima" rows="3" class="form-control"><?= $data['alamatPenerima'] ?></textarea>
    </div>
  </div>

  <div class="row">
    <div class="col-md-2">
      <div class="form-group">
        <label for="kodeBarang">Kode Barang</label>
        <input type="text" name="kodeBarang" class="form-control" value="<?= $data['kd_barang'] ?>">
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        <label for="namaBarang">Nama Barang</label>
        <input type="text" name="namaBarang" class="form-control" value="<?= $data['nama_barang'] ?>">
      </div>
    </div>
    <div class="col-md-3">
      <label for="jenisBarang">Jenis Barang</label>
      <select name="jenisBarang" class="form-control">
        <?php foreach (getJenisBarang() as $jenis) : ?>
          <option value="<?= $jenis['id_barang'] ?>" <?= $jenis['id_barang'] == $data['id_barang'] ? 'selected' : '' ?>><?php echo $jenis['barang'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label for="beratBarang">Berat Barang</label>
        <input type="text" name="beratBarang" class="form-control" value="<?= $data['berat_barang'] ?>">
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <label for="kotaAsal">Kota Asal</label>
      <select name="kotaAsal" class="form-control">
        <?php foreach (getKota() as $kota) : ?>
          <option value="<?= $kota['id_kota'] ?>" <?= $kota['id_kota'] == $data['id_kota'] ? 'selected' : '' ?>><?= $kota['kota'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label for="kotaTujuan">Kota Tujuan</label>
        <select name="kotaTujuan" class="form-control">
          <?php foreach (getKota() as $kota) : ?>
            <option value="<?= $kota['id_kota'] ?>" <?= $kota['id_kota'] == $data['id_kota'] ? 'selected' : '' ?>><?= $kota['kota'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label for="pilihLayanan">Pilih Layanan</label>
        <select name="pilihLayanan" id="pilihLayanan" onchange="ambilHarga()" class="form-control">
          <option id="text">Pilih Layanan...</option>
          <?php foreach (dataLayanan() as $layanan) : ?>
            <option value="<?= $layanan['kd_layanan'] ?>" <?= $layanan['kd_layanan'] == $data['kd_layanan'] ? 'selected' : '' ?>><?= $layanan['layanan'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="hargaTotal">Harga Total</label>
        <input type="text" class="form-control" name="hargaTotal" id="hargaTotal" value="<?= $data['harga'] ?>">
      </div>
    </div>
  </div>

  <div class="row justify-content-end">
    <div class="col-md-6">
      <button type="submit" name="btnEditTransaksi" class="btn btn-info" style="width: 100%;">PROSES</button>
    </div>
  </div>
</form>
<hr>