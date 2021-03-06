<!-- ITEM -->
<section class="layanan-item">
  <h1>Layanan Yang Menyesuaikan Segala <br>
    Kebutuhan Anda</h1>
  <h6>Divisi ekspress JNE melayani kiriman paket dan dokumen, waktu tujuan dalam negeri <br>
    melalui lebih 1.500 titik layanan ekslusif dari penjemputan hingga pengantaran yang tersebar <br>
    di seluruh Indonesia</h6>
  <div class="row justify-content-center">
  <?php foreach ($dataLayanan as $data) : ?>
    <div class="col-4">
      <div class="item-yes">
        <img src="assets/icon/003-airplane-1.png" alt="yes"> <br>
         <a href="?page=<?php echo strtolower($data['layanan']) ?>"><h2><?php echo $data['layanan']?></h2></a> 
        <h6><?php echo $data['keterangan'] ?> </h6>
      </div>
    </div>
    <?php endforeach ?>
  </div>
</section>
<!-- Akhir ITEM -->

<!-- RATING -->
<section class="rating">
  <div class="container">
    <h2>Apa Kata Mereka <br> Tentang Kami ?</h2>
    <hr style="margin-bottom: 70px;">
    <div class="row">
      <div class="col-6">
        <h6>kami sudah menggunakan jasa syn cepat sejak <br>
          pertama kami memulai bisnis kami 2019, hingga saat <br>
          ini kami bisa lebih luas lagi menjangkau ke daerah <br>
          seluruh wilayah Indonesia</h6>
        <hr>
        <h5 style="font-family: lora; font-size: 20px; font-weight: bold; color: #302683;">Maha Dwi Putra</h5>
        <img src="assets/icon/Rate1.png" alt="rate"> <br>
        <button type="submit" class="tombol-rating">Berikan Rating</button>
      </div>
      <div class="col-3">
        <div class="rate-1">
          <h1>4.8</h1>
          <h3>Mariyah</h3>
          <img src="assets/icon/Rate2.png" alt="Rate" width="166px" height="30.11px" style="margin-top: 26px;">
        </div>
      </div>
      <div class="col-3">
        <div class="rate-1">
          <h1>4.9</h1>
          <h3>MDP</h3>
          <img src="assets/icon/Rate2.png" alt="Rate" width="166px" height="30.11px" style="margin-top: 26px;">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- AKHIR RATING -->