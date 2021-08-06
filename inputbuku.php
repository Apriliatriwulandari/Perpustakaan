<?php
include "config/koneksi.php";
include "library/controller.php";

$go = new controller();

$tabel = "input";
@$field = array('kode_buku'=>$_POST['kode_buku'],'judul'=>$_POST['judul'],'pengarang'=>$_POST['pengarang'],'penginput'=>$_POST['penginput']);
$redirect= '?menu=inputbuku';
@$where = "kode_buku = $_GET[kode_buku]";

if(isset($_POST['simpan'])){ 
    $go->simpan($con, $tabel, $field, $redirect);
}

if(isset($_GET['hapus'])){
    $go->hapus($con, $tabel, $where, $redirect);
}

if(isset($_GET['edit'])){
    $edit = $go->edit($con, $tabel, $where);
}

if(isset($_POST['ubah'])){
    $go->ubah($con, $tabel, $field, $where, $redirect);
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Input Buku</title>
  </head>
  <body>
    <div class="container">
    <h2 class="text-warning">Form Input Buku</h2>
        <form method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold text-light">Kode Buku</label>
                <input type="text" name="kode_buku" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['kode_buku'] ?>"  required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold text-light">Judul Buku</label>
                <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['judul'] ?>"  required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold text-light">Nama Pengarang</label>
                <input type="text" name="pengarang" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['pengarang'] ?>"  required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label fw-bold text-light">Nama Penginput</label>
                <input type="text" name="penginput" class="form-control" id="exampleFormControlInput1" value="<?php echo @$edit['penginput'] ?>"  required>
            </div>
            <?php if(@$_GET['kode_buku']==""){ ?>
                <button class="btn fw-bold bg-success text-light" type="submit" name="simpan" value="SIMPAN">Simpan</button>
            <?php }else{ ?>
                <button class="btn fw-bold bg-success text-light" type="submit" name="ubah" value="UBAH">Ubah</button>
            <?php } ?>
        </form>
        <table align="center" border="4" class="mt-4 table table-stripped table-hover bg-white" id="data">
            <tr style="background-color:grey;">
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul</th>
                <th>Nama Pengarang</th>
                <th>Nama Penginput</th>
                <th>HAPUS</th>
                <th>EDIT</th>
            </tr>
            <?php
                $data = $go->tampil($con, $tabel);
                $no = 0;
                if($data==""){
                    echo "<tr><td colspan='7'>No Record</td></tr>";
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
                <td><a class="text-danger" href="?menu=inputbuku&hapus&kode_buku=<?php echo $r['kode_buku'] ?>" onclick="return confirm('Hapus Data?')">HAPUS</a></td>
                <td><a class="text-primary" href="?menu=inputbuku&edit&kode_buku=<?php echo $r['kode_buku'] ?>">EDIT</a></td>
            </tr>
            <?php } } ?>
        </table>
    </div>
  </body>
</html>