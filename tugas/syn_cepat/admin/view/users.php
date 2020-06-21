<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Data User <a href="#" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Tambah Data</a>
  </h1>
  <div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group mr-2">
      <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
      <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
    </div>
  </div>
</div>
<?= (isset($_SESSION['notif'])) ? $_SESSION['notif'] : '';
unset($_SESSION['notif']) ?>
<div class="table-responsive">
  <table class="table table-striped table-sm" id="myTable">
    <thead>
      <tr>
        <th>#</th>
        <th>Username</th>
        <th>Nama Lengkap</th>
        <th>Email</th>
        <th>Status</th>
        <th>Last Login</th>
        <th>Role</th>
        <th>Aktif</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1 ?>
      <?php foreach (dataUsers() as $user) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $user['username'] ?></td>
          <td><?= $user['nama_depan'] . '' . $user['nama_belakang'] ?></td>
          <td><?= $user['email'] ?> </td>
          <td><?= $user['aktif'] == 'Y' ? 'Aktif' : 'Tidak Aktif' ?></td>
          <td><?= $user['login_at'] ?></td>
          <td><?= $user['role'] ?></td>
          <td>
            <!-- TOMBOL EDIT -->
            <a href="?page=users&aksi=edit&id=<?= $user['id_user'] ?>" title="Edit Data <?= $user['username'] ?>"><i class="fa fa-edit text-info"></i></a>

            <!-- TOMBOL DELETE -->
            <a href="?page=act-users&aksi=delete&id=<?= $user['id_user'] ?>" onclick="return confirm('Yakin ingin menghapus data <?= $user['username'] ?> ?') "><i class="fa fa-trash text-info"></i></a></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>

<!-- FORM EDIT USER -->
<?php
if (isset($_GET['aksi'])) {
  if ($_GET['aksi'] == 'edit') {
    $iduser = $_GET['id'];
    $data = dataUsersById($iduser); ?>
    <form method="POST" action="?page=act-users&aksi=edit&id=<?= $iduser ?>">
      <input type="text" hidden id="iduser" name="iduser" value="<?= $data['id_user'] ?>">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>" id="username">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="email">Email Address</label>
            <input type="text" class="form-control" id="email" value="<?= $data['email'] ?>" name="email">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="namaDepan">Nama Depan</label>
            <input type="text" class="form-control" id="namaDepan" value="<?= $data['nama_depan'] ?>" name="namaDepan">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="namaBelakang">Nama Belakang</label>
            <input type="text" class="form-control" value="<?= $data['nama_belakang'] ?>" id="namaBelakang" name="namaBelakang">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="role">Sebagai</label>
            <select class="form-control" id="role" name="role">
              <?php foreach (dataRole() as $role) : ?>
                <option value="<?= $role['id_role'] ?>" <?= $data['id_role'] == $role['id_role'] ? 'selected' : '' ?>><?= $role['role'] ?> </option>
              <?php endforeach ?>
            </select>
          </div>
        </div>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="status" name="status" <?= $data['aktif'] == 'Y' ? 'checked' : '' ?>>
        <label class="form-check-label" for="status" name="status">Aktif</label>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btnEditUser">Submit</button>
      </div>
    </form>
<?php
  }
}
?>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="?page=act-users">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="email">Email Address</label>
                <input type="text" class="form-control" id="email" name="email">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="namaDepan">Nama Depan</label>
                <input type="text" class="form-control" id="namaDepan" name="namaDepan">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="namaBelakang">Nama Belakang</label>
                <input type="text" class="form-control" id="namaBelakang" name="namaBelakang">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="role">Sebagai</label>
                <select class="form-control" id="role" name="role">
                  <?php foreach (dataRole() as $role) : ?>
                    <option value="<?= $role['id_role'] ?>"><?= $role['role'] ?> </option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="status">
            <label class="form-check-label" for="status" name="status">Aktif</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="btnAddUsers">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>