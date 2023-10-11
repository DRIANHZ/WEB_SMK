<?php
include "proses/koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM tb_smk_revisi");

$no = 1;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>

<body>
    <a href="menu.php">tambah</a>
    <a href="page.php">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
        </svg>
    </a>

    <form action="hapus.php" method="post" >
        <table border='1'>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelamin</th>
                <th>Umur</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>



            <?php while ($tampil = mysqli_fetch_array($query)) : ?>
                <?php 

                   $bjir =  $tampil['id_kelas'];
                    $querykelas = mysqli_query($koneksi,"SELECT * FROM `tb_kelas` `id_kelas` where `id_kelas` = $bjir "); 


                    $datakelas = mysqli_fetch_array($querykelas);
                    
                    $kelas = $datakelas['kelas']." ".$datakelas['jurusan'];
                    
                    
                    
                    ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $tampil['nama']; ?></td>
                    <td><?php echo $tampil['nis']; ?></td>
                    <td><?php echo $tampil['kelamin']; ?></td>
                    <td><?php echo $tampil['umur']; ?></td>
                    <td><?php echo $kelas ?></td>
                    <td>
                        <a href='hapus.php?id=<?php echo $tampil['nis'] ?>&from=<?= "display" ?>'>hapus</a>
                        <a href='formubahdata.php?id=<?php echo $tampil['nis']; ?>'>ubah</a>
                        <a href='detail.php?id=<?php echo $tampil['nis']; ?>&kelas=<?= $tampil['id_kelas'] ?>'>detail</a>
                    </td>
                </tr>
                <?php $no++; ?>
            <?php endwhile; ?>
        </table>
    </form>
</body>

</html>