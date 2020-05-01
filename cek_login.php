<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
// belum mengunakan MD5
$username = addslashes(trim($_POST['username']));
// $username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi, "select * from login where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);


if ($cek > 0) {
    $login = mysqli_fetch_assoc($data);

    if ($login['kelas']=="akl1") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "akl1";
        header("location:jurusan/akl-1.php");

    } elseif ($login['kelas']=="admin") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "admin";
        header("location:jurusan/admin.php");

    } elseif ($login['kelas']=="akl2") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "akl2";
        header("location:jurusan/akl-2.php");

    } elseif ($login['kelas']=="otkp1") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "otkp1";
        header("location:jurusan/otkp-1.php");

    } elseif ($login['kelas']=="otkp2") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "otkp1";
        header("location:jurusan/otkp-2.php");

    } elseif ($login['kelas']=="tkj1") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "tkj1";
        header("location:jurusan/tkj-1.php");

    } elseif ($login['kelas']=="tkj2") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "tkj1";
        header("location:jurusan/tkj-2.php");

    } elseif ($login['kelas']=="tkr1") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "tkr1";
        header("location:jurusan/tkr-1.php");

    } elseif ($login['kelas']=="tkr2") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "tkr2";
        header("location:jurusan/tkr-2.php");

    } elseif ($login['kelas']=="tkr2") {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "tkr2";
        header("location:jurusan/tkr-2.php");

      } elseif ($login['kelas']=="tpm1") {
          $_SESSION['username'] = $username;
          $_SESSION['status'] = "tpm1";
          header("location:jurusan/tpm-1.php");

      } elseif ($login['kelas']=="tpm2") {
          $_SESSION['username'] = $username;
          $_SESSION['status'] = "tpm2";
          header("location:jurusan/tpm-2.php");

      } elseif ($login['kelas']=="tpm3") {
          $_SESSION['username'] = $username;
          $_SESSION['status'] = "tpm3";
          header("location:jurusan/tpm-3.php");



    } else {
      echo "salah1";
      //  header("location:index.php?pesan=gagal1");
    }
} else {
  echo "salah2";

  //  header("location:index.php?pesan=gagal");
}
