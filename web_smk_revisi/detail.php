<?php
include "proses/koneksi.php";

$id = $_GET['id'];
$getkelas = $_GET['kelas'];
// var_dump($getkelas);
// die();

$query = mysqli_query($koneksi, "SELECT * FROM `tb_smk_revisi` WHERE `nis` = $id ");

$tampilkan = mysqli_fetch_assoc($query);

$querykelas = mysqli_query($koneksi, "SELECT * FROM `tb_kelas` where `id_kelas` = $getkelas ");

$datakelas = mysqli_fetch_array($querykelas);

$kelas = $datakelas['kelas'] . " " . $datakelas['jurusan'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .card {
      width: 25%;
      height: 254px;
      border-radius: 20px;
      background: #f5f5f5;
      position: relative;
      padding: 1.8rem;
      border: 2px solid #c3c6ce;
      transition: 0.5s ease-out;
      overflow: visible;
      margin: auto;
      display: flex;
      margin-top: 10%;
    }


    .card-details {
      color: black;
      height: 100%;
      display: grid;
      place-content: center;
      margin-left: 60px;
    }

    .card-button {
      transform: translate(-50%, 125%);
      width: 60%;
      border-radius: 1rem;
      border: none;
      background-color: #008bf8;
      color: #fff;
      font-size: 1rem;
      padding: .5rem 1rem;
      position: absolute;
      left: 50%;
      bottom: 0;
      opacity: 0;
      transition: 0.3s ease-out;
    }

    .text-body {
      color: rgb(134, 134, 134);
    }

    /*Text*/
    .text-title {
      font-size: 1.5em;
      font-weight: bold;
    }

    /*Hover*/
    .card:hover {
      border-color: #008bf8;
      box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
    }

    .card:hover .card-button {
      transform: translate(-50%, 50%);
      opacity: 1;
    }

    .profil {
      margin-top: 20px;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      background-image: url('image/profil.jpg');
      background-position: center;
      background-size: cover;
    }


    @media screen and (max-width: 1350px) {
      .card {
        width: 40%;
      }
    }

    @media screen and (max-width: 750px) {
      .card {
        width: 55%;
      }
    }

    @media screen and (max-width: 550px) {
      .card {
        width: 70%;
        display: flex;
        flex-direction: column;
        height: 400px;
    
      }

      .card-details{
        margin-left: 20px;
      }

      .profil{
        width: 200px;
        height: 150%;
        background-size: cover;
        background-position: center;
      }

      @media screen and (max-width: 270px) {
        .profil{
          width: 150px;
          height: 100%;
        }
    }

    }
  </style>
</head>

<body>
  <div class="card">
    <div class="profil"></div>
    <div class="card-details">
      <p class="text-title"><?= $tampilkan['nama'] ?></p>
      <table>
        <tr>
          <td>nis :</td>
          <td><?= $tampilkan['nis'] ?></td>
        </tr>
        <tr>
          <td>gender :</td>
          <td><?= $tampilkan['kelamin'] ?></td>
        </tr>
        <tr>
          <td>umur :</td>
          <td><?= $tampilkan['umur'] ?></td>
        </tr>
        <tr>
          <td>kelas :</td>
          <td><?= $kelas ?></td>
        </tr>
      </table>

    </div>
    <button class="card-button">rekyasa prangkat lunak</button>
  </div>
</body>

</html>