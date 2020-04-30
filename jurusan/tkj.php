<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Kelulusan 2020</title>
  <link rel="stylesheet" href="../css/bootstrap.css">
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="=../js/jquery-latest.js"></script>
  <script type="text/javascript" src="../js/jquery.tablesorter.min.js"></script>

</head>

<body>
  <div class="container">

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <center><img style="margin-top: 25px;" src="../images/logo-banten.png" />
        </div>
        <div class="col-md-6">
          <center>
            <h2 style="margin-top:  25px;"><b>SMK Negeri 1 Kragilan</b></h2>
          </center>
          <center>
            <h2><b>Tampil Kelulusan Siswa</b></h4>
          </center>
          <center>
            <h2><b>Tahun Pelajaran 2019/2020</b></h4>
          </center>
          <br>
          <!-- font ganti jenis -->
        </div>
        <div class="col-md-3">
          <center><img style="margin-bottom:  80px; margin-top:  25px;" class="img-fluid" src="../images/logo-smkn1.png" />
        </div>
      </div>
      <table class="table table-bordered table-hover" id="domainsTable">
      <thead>
        <tr>
          <th><center>No</th>
          <th><center>NISN Siswa</th>
          <th><center>Nama Siswa</th>
          <th><center>Kelas</th>
          <th><center>Status</th>

        </tr>
      </thead>
      <tbody>
        <?php
          include 'koneksi.php';
          $halperpage = 50;
          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
          $mulai = ($page>1) ? ($page * $halperpage) - $halperpage : 0;
          $result = mysqli_query($koneksi, "SELECT

            nisn,
            nama,
            kelas,
            status

             FROM siswa where kelas='XII TKJ 1'");
          $total = mysqli_num_rows($result);
          $pages = ceil($total/$halperpage);

          $data = mysqli_query($koneksi, "SELECT
            nisn,
            nama,
            kelas,
            status
            from siswa where kelas='XII TKJ 1' LIMIT $mulai, $halperpage ");
          $no = $mulai+1;


          while ($d = mysqli_fetch_array($data)) {
              ?>

        <tr>
          <td><center><?php echo $no++ ?></td>
          <td><center><?php echo $d['nisn']; ?></td>
          <td><center><?php echo $d['nama']; ?></td>
          <td><center><?php echo $d['kelas']; ?></td>
          <td><center><?php echo $d['status']; ?></td>

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
          } ?>
    </div>
    </div>
    <script>
        $(document).ready(function()
            {
                $("#domainsTable").tablesorter({sortList: [[3,1],[2,0]]});
            }
        );

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

    </div>
  </div>
</body>

</html>
