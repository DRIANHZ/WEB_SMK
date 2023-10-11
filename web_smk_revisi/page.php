<?php
include "proses/koneksi.php";

$pplg1 = mysqli_query($koneksi, "SELECT * FROM `tb_smk_revisi` where id_kelas = 1");
$pplg2 = mysqli_query($koneksi, "SELECT * FROM `tb_smk_revisi` where id_kelas = 2");
$rpl1 = mysqli_query($koneksi, "SELECT * FROM `tb_smk_revisi` where id_kelas = 3");
$rpl2 = mysqli_query($koneksi, "SELECT * FROM `tb_smk_revisi` where id_kelas = 4");


$no1 = mysqli_num_rows($pplg1);
$no2 = mysqli_num_rows($pplg2);
$no3 = mysqli_num_rows($rpl1);
$no4 = mysqli_num_rows($rpl2);



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="item item1">
            <div class="wraper1">
                <div class="totalpplg1" onclick="pplg1()">
                    <h5> 10 pplg 1</h5>
                    <h2><?= $no1 ?></h2>
                </div>
                <div class="totalpplg2" onclick="pplg2()">
                    <h5>10 pplg 2</h5>
                    <h2><?= $no2 ?></h2>
                </div>
            </div>
            <div class="wraper2">
                <div class="totalrpl1" onclick="rpl1()">
                    <h5> 11 rpl 1</h5>
                    <h2><?= $no3 ?></h2>
                </div>
                <div class="totalrpl2" onclick="rpl2()">
                    <h5> 11 rpl 2</h5>
                    <h2><?= $no4 ?></h2>
                </div>
            </div>
        </div>
        <div class="item item2 ">

        <div class="content"></div>

        </div>
        <div class="item item3">

        </div>

        <div class="item menu" onclick="pindah()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
            </svg>
        </div>
    </div>

    <script>
        function pindah() {
            window.location.href = "menu.php";
        }

        function pplg1() {
            window.location.href = "kelas.php?id=<?= 1 ?>";
        }

        function pplg2() {
            window.location.href = "kelas.php?id=<?= 2 ?>";
        }

        function rpl1() {
            window.location.href = "kelas.php?id=<?= 3 ?>";
        }

        function rpl2() {
            window.location.href = "kelas.php?id=<?= 4 ?>";
        }
    </script>
</body>

</html>