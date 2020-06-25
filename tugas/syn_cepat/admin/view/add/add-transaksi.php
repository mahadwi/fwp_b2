<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data Transaksi <a href="#" class="btn btn-info"><i class="fa fa-plus"></i>Tambah Data</a>
  </h1>
</div>
<form method="POST" action="?page=act-transaksi">
  <!-- KODE TRANSAKSI -->
  <div class="row">
    <div class="col-md-4 mb-2">
      <div class="header">
        <h5 class="modal-title" id="exampleModalLabel">Kode Transaksi</h5>
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <input class="form-control" type="text" name="kdTransaksi" id="kdTransaksi">
      </div>
    </div>
  </div>
  <!-- PENGIRIM -->
  <div class="row">
    <div class="col-md-4">
      <div class="header">
        <h5 class="modal-title">Pengirim</h5>
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="namaPengirim">Nama</label>
        <input type="text" class="form-control" id="namaPengirim" name="namaPengirim" value="">
      </div>
      <div class="form-group">
        <label for="kontak">Kontak</label>
        <input type="text" class="form-control" id="kontak" name="kontakPengirim">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="kontak">Alamat</label>
        <textarea rows="4" class="form-control" id="alamat" name="alamatPengirim"></textarea>
      </div>
    </div>
  </div>
  <!-- PENERIMA -->
  <div class="row">
    <div class="col-md-4">
      <div class="header">
        <h5 class="modal-title" id="exampleModalLabel">Penerima</h5>
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label for="email">Nama</label>
        <input type="text" class="form-control" id="email" value="" name="namaPenerima">
      </div>
      <div class="form-group">
        <label for="kontak">Kontak</label>
        <input type="text" class="form-control" id="kontak" name="kontak">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="kontak">Alamat</label>
        <textarea rows="4" class="form-control" id="alamat" name="alamat"></textarea>
      </div>
    </div>
  </div>
  <!-- BARANG -->
  <div class="row">
    <div class="col-md-4 mb-2">
      <div class="header">
        <h5 class="modal-title" id="exampleModalLabel">Barang</h5>
        </button>
      </div>
    </div>
    <div class="col-md-4 mb-2">
      <div class="header">
        <h5 class="modal-title" id="exampleModalLabel">Jenis Barang</h5>
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <input type="text" class="form-control" id="namabarang" name="namabarang" placeholder="Nama Barang">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <select class="form-control" name="jenisBarang" id="jenis">
          <?php foreach (getJenisBarang() as $jenis) : ?>
            <option value="<?= $jenis['kd_jenis'] ?>"><?= $jenis['nama_jenisBarang'] ?></option>
          <?php endforeach ?>

        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <input type="text" class="form-control" id="berat" name="berat" placeholder="Berat">
      </div>
    </div>
  </div>
  <!-- ASAL KOTA -->
  <div class="row">
    <div class="col-md-4 mb-2">
      <div class="header">
        <h5 class="modal-title">Asal Kota</h5>
        </button>
      </div>
    </div>
    <div class="col-md-4  mb-2">
      <div class="header">
        <h5 class="modal-title">Tujuan Kota</h5>
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <select class="form-control" name="asalKota" id="asalKota">
          <?php foreach (getKota() as $kota) : ?>
            <option value="<?= $kota['id_kota'] ?>"><?= $kota['kota'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <select class="form-control" name="tujuanKota" id="tujuanKota">
          <?php foreach (getKota() as $kota) : ?>
            <option value="<?= $kota['id_kota'] ?>"><?= $kota['kota'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4 mb-2">
      <div class="header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Layanan</h5>
        </button>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <select class="form-control" name="pilihLayanan" id="pilihLayanan" onchange="ambilHarga()">
          <option id="text" value="">Pilih Layanan</option>
          <?php foreach (dataLayanan() as $layanan) : ?>
            <option value="<?= $layanan['kd_layanan'] ?>"><?= $layanan['layanan'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-md-4">
      <div class="form-group">
        <input type="text" class="form-control" id="hargaTotal" name="hargaTotal" placeholder="Total Harga">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <button type="button" class="btn btn-primary btn-lg" name="btnTransaksi">PROSES</button>
    </div>
  </div>
</form>