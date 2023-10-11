<?php 

include "proses/koneksi.php";

$id = $_GET['id'];
$kelas = $_GET['kelas'];
$from = $_GET['from'];

mysqli_query($koneksi,"DELETE FROM `tb_smk_revisi` WHERE nis = $id");

// var_dump($from);
// die();

if($from == "display"){
    header("location:display.php");
}else if($from == "$kelas"){
    header("location:kelas.php?id=$kelas");
}

?>