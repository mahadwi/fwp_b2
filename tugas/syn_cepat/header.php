<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="?page=home"><img src="assets/logo/logo syn cepat.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav text-uppercase ml-auto">
        <a class="nav-item nav-link mr-3" href="?page=home">perusahaan</a>
        <a class="nav-item nav-link mr-3" href="?page=layanan">produk & layanan</a>
        <a class="nav-item nav-link mr-3" href="#">mitra</a>
        <a class="nav-item nav-link mr-3" href="#">karir</a>
        <a class="nav-item nav-link mr-3" href="#">hubungi kami</a>
        <?php
        if (isset($_SESSION['username'])) : ?>
          <a class="nav-item nav-link mr-3" href="#"><?= $_SESSION['username'] ?></a>
          <a class="nav-item nav-link mr-3" href="?page=act-logout">Logout</a>
        <?php else : ?>
          <a class="nav-item nav-link mr-3" href="?page=login">Login</a>
        <?php endif ?>
      </div>
    </div>
  </div>
</nav>
<!-- Akhir Navbar -->