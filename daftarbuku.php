<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();

$tabel = "input";
$redirect= '?menu=inputbuku';



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Daftar Buku</title>
  </head>
  <body>
    <div class="container">
        <h2 class="text-warning">Daftar Buku</h2>
        <table align="center" border="4" class="mt-4 table table-stripped table-hover bg-white thead-dark" id="data">
            <tr style="background-color:grey;">
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Nama Pengarang</th>
                <th>Nama Penginput</th>
            </tr>
            <?php
                $data = $go->tampil($con, $tabel);
                $no = 0;
                if($data==""){
                    echo "<tr><td colspan='4'>No Record</td></tr>";
                }else{

                foreach($data as $r){
                    $no++
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['kode_buku'] ?></td>
                <td><?php echo $r['judul'] ?></td>
                <td><?php echo $r['pengarang'] ?></td>
                <td><?php echo $r['penginput'] ?></td>
            </tr>
            <?php } } ?>
        </table>
    </div>
  </body>
</html>