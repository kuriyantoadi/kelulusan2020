<!DOCTYPE html>
<html lang="en">

<head>
  <title>Operator PPDB </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery-latest.js"></script>
  <script type="text/javascript" src="js/jquery.tablesorter.min.js"></script>
</head>

<body>



  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <center><img style="margin-bottom:  70px; margin-top:  25px;" class="img-fluid" src="images/logo-smkn1.png" />
      </div>
      <div class="col-md-6">
        <center>
          <h4 style="margin-top:  25px;"><b>SMK Negeri 1 Kragilan</b></h4>
        </center>
        <center>
          <h4><b>Tampil Kelulusan Siswa</b></h4>
        </center>
        <center>
          <h4><b>Tahun Pelajaran 2019/2020</b></h4>
        </center>
        <br>
        <!-- font ganti jenis -->
      </div>

    </div>
    <div class="row">
      <div class="col-sm-8">
        <a href="" type="button" class="btn btn-info">TKJ</a>
        <a href="../rpl/index.php" type="button" class="btn btn-info" role="button">RPL</a>
        <a href="../akl/index.php" type="button" class="btn btn-info">AKL</a>
        <a href="" type="button" class="btn btn-info">OTKP</a>
        <a href="../mesin/index.php" type="button" class="btn btn-info">TPM</a>
        <a href="" type="button" class="btn btn-info">TKR</a>
      </div>

      <div class="col-sm-4">
        <input type='text' placeholder="Cari Nama Siswa" class="form-control" id='input' onkeyup='searchTable()'>
      </div>
    </div>
<br>
    <table class="table table-bordered table-hover" id="domainsTable">
      <thead>
        <tr>
          <th>
            <center>NISN Siswa
          </th>
          <th>
            <center>Nama Siswa
          </th>
          <th>
            <center>Kelas
          </th>
          <th>
            <center>Status
          </th>

        </tr>
      </thead>
      <tbody>
        <?php
      include 'koneksi.php';
    $halperpage = 10;
    $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
    $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
    $result = mysqli_query($koneksi, "SELECT
      nisn,
      nama,
      kelas,
      status
      FROM siswa");
    $total = mysqli_num_rows($result);
    $pages = ceil($total/$halperpage);

    $data = mysqli_query($koneksi, "SELECT
      nisn,
      nama,
      kelas,
      status
      from siswa LIMIT $mulai, $halperpage ");
    $no = $mulai+1;


    while ($d = mysqli_fetch_array($data)) {
        ?>

        <tr>
          <td>
            <center><?php echo $d['nisn']; ?>
          </td>
          <td>
            <center><?php echo $d['nama']; ?>
          </td>
          <td>
            <center><?php echo $d['kelas']; ?>
          </td>
          <td>
            <center><?php echo $d['status']; ?>
          </td>
        </tr>

        <?php
    } ?>
      </tbody>
    </table>
    <div>
      <?php for ($i=1; $i<=$pages ; $i++) {
        ?>
      <a class="btn btn-info btn-md" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php
    } // database

  ?>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#domainsTable").tablesorter({
        sortList: [
          [3, 1],
          [2, 0]
        ]
      });
    });

    function searchTable() {
      var input;
      var saring;
      var status;
      var tbody;
      var tr;
      var td;
      var i;
      var j;
      input = document.getElementById("input");
      saring = input.value.toUpperCase();
      tbody = document.getElementsByTagName("tbody")[0];;
      tr = tbody.getElementsByTagName("tr");
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
          if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
            status = true;
          }
        }
        if (status) {
          tr[i].style.display = "";
          status = false;
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  </script>

</body>

</html>
