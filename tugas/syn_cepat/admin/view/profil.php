<?php
$data = dataUsersById($_SESSION['idUser']);
?>
<div class="container bootstrap snippet">
  <div class="row">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Ubah Profil</h1>
    </div>
  </div>
  <?= (isset($_SESSION['notif'])) ? $_SESSION['notif'] : '';
  unset($_SESSION['notif']) ?>
  <div class="row">
    <div class="col-sm-3">
      <!--left col-->
      <form class="form" action="?page=act-profil" method="post" enctype="multipart/form-data">
        <div class="text-center">
          <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
          <h6>Upload a different photo...</h6>
          <input type="file" name="fotoProfil" class="text-center center-block file-upload">
        </div>
        </hr><br>

        <ul class="list-group">
          <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
          <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
        </ul>

        <hr>

    </div>
    <!--/col-3-->
    <div class="col-sm-9">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
        </li>
        <li class="nav-item" role="presentation">
          <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <hr>
          <div class="form-group">
            <div class="col-xs-6">
              <label for="namaDepan">Nama Depan</label>
              <input type="text" class="form-control" name="namaDepan" id="namaDepan" placeholder="nama depan" title="enter your first name if any." value="<?= $data['nama_depan'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6">
              <label for="namaBelakang">Nama Belakang</label>
              <input type="text" class="form-control" name="namaBelakang" id="namaBelakang" placeholder="nama belakang" title="enter your last name if any." value="<?= $data['nama_belakang'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6">
              <input type="radio" name="jk" id="pria" value="Pria" <?= $data['jk'] == 'Pria' ? 'checked' : '' ?>>
              <label for="pria">Pria</label> &nbsp;&nbsp;&nbsp;
              <input type="radio" name="jk" id="wanita" value="Wanita" <?= $data['jk'] == 'Wanita' ? 'checked' : '' ?>>
              <label for="wanita">Wanita</label>

            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6">
              <label for="tglLahir">Tanggal Lahir</label>
              <input type="date" class="form-control" name="tglLahir" id="tglLahir" placeholder="dd/mm/yy" title="enter your last name if any." value="<?= $data['tgl_lahir'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6">
              <label for="noTelp">No. Telepon</label>
              <input type="text" class="form-control" name="noTelp" id="noTelp" placeholder="masukan no telepon" title="enter your phone number if any." value="<?= $data['kontak'] ?>">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-6">
              <label for="alamat">Alamat</label>
              <textarea class="form-control" name="alamat" id="alamat" placeholder="masukan alamat lengkap" title="enter your email."><?= $data['alamat'] ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <br>
              <button class="btn btn-lg btn-success" type="submit" name="ubahProfil"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
              <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
            </div>
          </div>
          </form>
        </div>

        <!--/tab-pane-->
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
          <form action="?page=act-profil" method="POST">
            <div class="form-group">
              <div class="col-xs-6">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="uesename" title="enter your password." value="<?= $data['username'] ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your mobile number if any." value="<?= $data['email'] ?>">
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-6">
                <label for="passwordLama">Password Lama</label>
                <input type="password" class="form-control" name="passwordLama" id="passwordLama" placeholder="password lama" title="enter your password.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-6">
                <label for="passwordBaru">Password Baru</label>
                <input type="password" class="form-control" name="passwordBaru" id="passwordBaru" placeholder="password baru" title="enter your password.">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for="ulgPassword">Ulangi Password Baru</label>
                <input type="password" class="form-control" name="passworbaru2" id="passworbaru2" placeholder="Ulangi Password" title="enter your password2.">
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <br>
                <button class="btn btn-lg btn-success" type="submit" name="ubahPassword"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/col-9-->
  </div>
  <!--/row-->