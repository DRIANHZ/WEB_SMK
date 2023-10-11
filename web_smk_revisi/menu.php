<?php
include "proses/koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM tb_kelas");




?>
<a href="display.php">data</a>
<a href="page.php">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
    </svg>
</a>
<form action="" method="post">
    <table border="1">
        <tr>
            <td>nama</td>
            <td><input type="text" name="nama"></td>
        </tr>

        <tr>
            <td>nis</td>
            <td><input type="text" name="nis"></td>
        </tr>

        <tr>
            <td>kelamin</td>
            <td>
                <input type="radio" name="kelamin" value="laki-laki">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-standing" viewBox="0 0 16 16">
                    <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3ZM6 6.75v8.5a.75.75 0 0 0 1.5 0V10.5a.5.5 0 0 1 1 0v4.75a.75.75 0 0 0 1.5 0v-8.5a.25.25 0 1 1 .5 0v2.5a.75.75 0 0 0 1.5 0V6.5a3 3 0 0 0-3-3H7a3 3 0 0 0-3 3v2.75a.75.75 0 0 0 1.5 0v-2.5a.25.25 0 0 1 .5 0Z" />
                </svg>
                <input type="radio" name="kelamin" value="perempuan">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-standing-dress" viewBox="0 0 16 16">
                    <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Zm-.5 12.25V12h1v3.25a.75.75 0 0 0 1.5 0V12h1l-1-5v-.215a.285.285 0 0 1 .56-.078l.793 2.777a.711.711 0 1 0 1.364-.405l-1.065-3.461A3 3 0 0 0 8.784 3.5H7.216a3 3 0 0 0-2.868 2.118L3.283 9.079a.711.711 0 1 0 1.365.405l.793-2.777a.285.285 0 0 1 .56.078V7l-1 5h1v3.25a.75.75 0 0 0 1.5 0Z" />
                </svg>
            </td>
        </tr>

        <tr>
            <td>umur</td>
            <td><input type="text" name="umur"></td>
        </tr>

        <tr>
            <td>id_kelas</td>
            <td>
                <select name="id_kelas" id="">
                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                        <option value="<?= $data['id_kelas'] ?>"><?= $data['kelas'] . " " . $data['jurusan'] ?></option>
                    <?php } ?>


                </select>
            </td>
        </tr>

        <tr>
            <td rowspan="2">
                <input type="submit" name="submit" value="masukan" onclick="tampilkanalert()">
            </td>
        </tr>

    </table>
</form>
<?php

// $cek = isset($koneksi,"SELECT * FROM `tb_smk_revisi` WHERE nis = $_POST[nis]");
// var_dump($cek);
// die();


if (isset($_POST['submit'])) {
    $cek = mysqli_query($koneksi, "SELECT `nis` FROM `tb_smk_revisi` WHERE `nis` = '$_POST[nis]' ");
    $result = mysqli_fetch_assoc($cek);

    if ($_POST['nis'] == $result) {
        return "maaf data nis ini sudah ada";
    } else if ($_POST['nis'] !== $result){
        mysqli_query($koneksi, "INSERT INTO `tb_smk_revisi`(`nama`, `nis`, `kelamin`, `umur`, `id_kelas`) VALUES ('$_POST[nama]','$_POST[nis]','$_POST[kelamin]','$_POST[umur]','$_POST[id_kelas]')");
    }
}
    $bjir = $_POST['nis'];
   
?>

<script>
    function tampilkanalert() {
        <?php if ($_POST['nis'] == $result) { ?>
            alert("<?= "maaf data nis ini sudah ada pada data murid lain mungkin anda salah memasukan nis?" ?>");
        <?php } else if(!$_POST['nis'] !== $result) { ?>
            alert("anda telah memasukan data");
        <?php } ?>
    }
</script>

<!-- 
// if(isset($_POST['submit'])){
//     $id_kelas = $_POST['id_kelas'];

//     if($id_kelas == 1){
//         mysqli_query($koneksi,"INSERT INTO `10_pplg_1`(`nama`, `nis`, `kelamin`, `umur`, `id_kelas`) VALUES ('$_POST[nama]','$_POST[nis]','$_POST[kelamin]','$_POST[umur]','$_POST[id_kelas]')");
//     }else if($id_kelas == 2){
//         mysqli_query($koneksi,"INSERT INTO `10_pplg_2`(`nama`, `nis`, `kelamin`, `umur`, `id_kelas`) VALUES ('$_POST[nama]','$_POST[nis]','$_POST[kelamin]','$_POST[umur]','$_POST[id_kelas]')");
//     }
// $query =  mysqli_query($koneksi,$masukan);
//     if($query){
//         echo "data berhasil masuk";
//     }else if(!$query){
//         die(mysqli_error($koneksi));
//     }

// } -->