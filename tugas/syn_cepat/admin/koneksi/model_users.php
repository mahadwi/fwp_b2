<?php
function dataUsers()
{
  global $konek;
  $data = [];
  $sql = "SELECT * FROM users inner join users_profile on users.id_user=users_profile.id_user inner join users_role on users.id_role=users_role.id_role";
  $query = mysqli_query($konek, $sql);
  while ($x = mysqli_fetch_assoc($query)) {
    $data[] = $x;
  }
  return $data;
}
function dataUsersById($iduser)
{
  global $konek;
  $sql = "SELECT * FROM users inner join users_profile on users.id_user=users_profile.id_user inner join users_role on users.id_role=users_role.id_role WHERE users.id_user='$iduser' order by created_at asc";
  $query = mysqli_query($konek, $sql);
  $data = mysqli_fetch_assoc($query);
  return $data;
}
function dataRole()
{
  global $konek;
  $data = [];
  $sql = "SELECT * FROM users_role order by role asc";
  $query = mysqli_query($konek, $sql);
  while ($x = mysqli_fetch_assoc($query)) {
    $data[] = $x;
  }
  return $data;
}
