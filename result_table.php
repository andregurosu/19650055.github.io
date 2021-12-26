<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Sistem Informasi Kenaikan Pangkat</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">SIKAT</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form_data.php">FORM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_table.php">DATA</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              RESULT
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="result_table.php?metode=SAW">SAW</a></li>
              <li><a class="dropdown-item" href="result_table.php?metode=WP">WP</a></li>
              <li><a class="dropdown-item" href="result_table.php?metode=topsis">TOPSIS</a></li>
              <li><a class="dropdown-item" href="result_table.php?metode=topsis">MULTIMOORA</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  $metode = $_GET['metode'];
  if ($metode == 'SAW') { ?>
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 500px;">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="data_alternatif-tab" data-bs-toggle="tab" data-bs-target="#data_alternatif" type="button" role="tab" aria-controls="data_alternatif" aria-selected="true">Matrix Result</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_skala-tab" data-bs-toggle="tab" data-bs-target="#data_skala" type="button" role="tab" aria-controls="data_skala" aria-selected="false">Normalisasi Result</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_bobot-tab" data-bs-toggle="tab" data-bs-target="#data_bobot" type="button" role="tab" aria-controls="data_bobot" aria-selected="false">Rangking Result</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="data_alternatif" role="tabpanel" aria-labelledby="data_alternatif-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from vmatrixkeputusan");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_matrix]</td>
                        <td>$show[id_alternatif]</td>
                        <td>$show[nama_alternatif]</td>
                        <td>$show[id_kriteria]</td>
                        <td>$show[nama_kriteria]</td>
                        <td>$show[id_bobot]</td>
                        <td>$show[value]</td>
                        <td>$show[nilai]</td>
                        <td>$show[keterangan]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_skala" role="tabpanel" aria-labelledby="data_skala-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
                <th>NORMALISASI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from vnormalisasi");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                    <td>$show[id_matrix]</td>
                    <td>$show[id_alternatif]</td>
                    <td>$show[nama_alternatif]</td>
                    <td>$show[id_kriteria]</td>
                    <td>$show[nama_kriteria]</td>
                    <td>$show[id_bobot]</td>
                    <td>$show[value]</td>
                    <td>$show[nilai]</td>
                    <td>$show[keterangan]</td>
                    <td>$show[normalisasi]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_bobot" role="tabpanel" aria-labelledby="data_bobot-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>RANGKING</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from vrangking");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_alternatif]</td>
                        <td>$show[nama_alternatif]</td>
                        <td>$show[rangking]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
    </div>
  <?php } elseif ($metode == 'WP') { ?>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 500px;">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="data_alternatif-tab" data-bs-toggle="tab" data-bs-target="#data_alternatif" type="button" role="tab" aria-controls="data_alternatif" aria-selected="true">Matrix Result</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_skala-tab" data-bs-toggle="tab" data-bs-target="#data_skala" type="button" role="tab" aria-controls="data_skala" aria-selected="false">Normalisasi Terbobot WP</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_bobot-tab" data-bs-toggle="tab" data-bs-target="#data_bobot" type="button" role="tab" aria-controls="data_bobot" aria-selected="false">Pangkat WP pra nilai S</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_kriteria-tab" data-bs-toggle="tab" data-bs-target="#data_kriteria" type="button" role="tab" aria-controls="data_kriteria" aria-selected="false">Nilai S wp</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_matrix-tab" data-bs-toggle="tab" data-bs-target="#data_matrix" type="button" role="tab" aria-controls="data_matrix" aria-selected="false">Nilai V WP</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="data_alternatif" role="tabpanel" aria-labelledby="data_alternatif-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from vmatrixkeputusan");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_matrix]</td>
                        <td>$show[id_alternatif]</td>
                        <td>$show[nama_alternatif]</td>
                        <td>$show[id_kriteria]</td>
                        <td>$show[nama_kriteria]</td>
                        <td>$show[id_bobot]</td>
                        <td>$show[value]</td>
                        <td>$show[nilai]</td>
                        <td>$show[keterangan]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_skala" role="tabpanel" aria-labelledby="data_skala-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID BOBOT</th>
                <th>ID KRITERIA</th>
                <th>VALUE</th>
                <th>JUMLAH</th>
                <th>NORMALISASI WP</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from wp_normalisasiterbobot");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_bobot]</td>
                        <td>$show[id_kriteria]</td>
                        <td>$show[value]</td>
                        <td>$show[jumlah]</td>
                        <td>$show[normalisasi_w]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_bobot" role="tabpanel" aria-labelledby="data_bobot-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
                <th>NORMALISASI WP</th>
                <th>PANGKAT</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from wp_pangkat");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_matrix]</td>
                        <td>$show[id_alternatif]</td>
                        <td>$show[nama_alternatif]</td>
                        <td>$show[id_kriteria]</td>
                        <td>$show[nama_kriteria]</td>
                        <td>$show[id_bobot]</td>
                        <td>$show[value]</td>
                        <td>$show[nilai]</td>
                        <td>$show[keterangan]</td>
                        <td>$show[normalisasi_w]</td>
                        <td>$show[pangkat]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_kriteria" role="tabpanel" aria-labelledby="data_kriteria-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>NILAI S</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from wp_nilais");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_alternatif]</td>
                        <td>$show[nama_alternatif]</td>
                        <td>$show[nilai_S]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_matrix" role="tabpanel" aria-labelledby="data_matrix-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>NILAI V</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from wp_nilaiv");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_alternatif]</td>
                        <td>$show[nama_alternatif]</td>
                        <td>$show[nilai_V]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
    </div>
  <?php } elseif ($metode == 'topsis') { ?>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 500px;">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="data_alternatif-tab" data-bs-toggle="tab" data-bs-target="#data_alternatif" type="button" role="tab" aria-controls="data_alternatif" aria-selected="true">MATRIX RESULT</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_skala-tab" data-bs-toggle="tab" data-bs-target="#data_skala" type="button" role="tab" aria-controls="data_skala" aria-selected="false">PEMBAGI TOPSIS</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_bobot-tab" data-bs-toggle="tab" data-bs-target="#data_bobot" type="button" role="tab" aria-controls="data_bobot" aria-selected="false">MAX MIN TOPSIS</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_kriteria-tab" data-bs-toggle="tab" data-bs-target="#data_kriteria" type="button" role="tab" aria-controls="data_kriteria" aria-selected="false">NORMALISASI TERBOBOT TOPSIS</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_matrix-tab" data-bs-toggle="tab" data-bs-target="#data_matrix" type="button" role="tab" aria-controls="data_matrix" aria-selected="false">NILAI V TOPSIS</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="data_alternatif" role="tabpanel" aria-labelledby="data_alternatif-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from vmatrixkeputusan");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_matrix]</td>
                        <td>$show[id_alternatif]</td>
                        <td>$show[nama_alternatif]</td>
                        <td>$show[id_kriteria]</td>
                        <td>$show[nama_kriteria]</td>
                        <td>$show[id_bobot]</td>
                        <td>$show[value]</td>
                        <td>$show[nilai]</td>
                        <td>$show[keterangan]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_skala" role="tabpanel" aria-labelledby="data_skala-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>BAGI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from topsis_pembagi");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_kriteria]</td>
                        <td>$show[nama_kriteria]</td>
                        <td>$show[bagi]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_bobot" role="tabpanel" aria-labelledby="data_bobot-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>MAXIMUM</th>
                <th>MINIMUM</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from topsis_maxmin");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_matrix]</td>
                        <td>$show[id_kriteria]</td>
                        <td>$show[nama_kriteria]</td>
                        <td>$show[maximum]</td>
                        <td>$show[minimum]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_kriteria" role="tabpanel" aria-labelledby="data_kriteria-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
                <th>NORMALISASI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from topsis_normalisasi");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                    <td>$show[id_matrix]</td>
                    <td>$show[id_alternatif]</td>
                    <td>$show[nama_alternatif]</td>
                    <td>$show[id_kriteria]</td>
                    <td>$show[nama_kriteria]</td>
                    <td>$show[id_bobot]</td>
                    <td>$show[value]</td>
                    <td>$show[nilai]</td>
                    <td>$show[keterangan]</td>
                    <td>$show[normalisasi]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_matrix" role="tabpanel" aria-labelledby="data_matrix-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID ALTERNATIF</th>
                <th>D PLUS</th>
                <th>D MIN</th>
                <th>NILAI V</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from topsis_nilaiv");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                    <tr>
                        <td>$show[id_alternatif]</td>
                        <td>$show[dplus]</td>
                        <td>$show[dmin]</td>
                        <td>$show[nilaiv]</td>
                    </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
    </div>
  <?php } elseif ($metode == 'multimoora') { ?>

    <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 500px;">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="data_alternatif-tab" data-bs-toggle="tab" data-bs-target="#data_alternatif" type="button" role="tab" aria-controls="data_alternatif" aria-selected="true">MATRIX RESULT</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_skala-tab" data-bs-toggle="tab" data-bs-target="#data_skala" type="button" role="tab" aria-controls="data_skala" aria-selected="false">MULTIMOORA 1</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_bobot-tab" data-bs-toggle="tab" data-bs-target="#data_bobot" type="button" role="tab" aria-controls="data_bobot" aria-selected="false">MULTIMOORA 2</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_kriteria-tab" data-bs-toggle="tab" data-bs-target="#data_kriteria" type="button" role="tab" aria-controls="data_kriteria" aria-selected="false">MULTIMOORA 3</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="data_matrix-tab" data-bs-toggle="tab" data-bs-target="#data_matrix" type="button" role="tab" aria-controls="data_matrix" aria-selected="false">MULTIMOORA 4</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="data_alternatif" role="tabpanel" aria-labelledby="data_alternatif-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from vmatrixkeputusan");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                <tr>
                    <td>$show[id_matrix]</td>
                    <td>$show[id_alternatif]</td>
                    <td>$show[nama_alternatif]</td>
                    <td>$show[id_kriteria]</td>
                    <td>$show[nama_kriteria]</td>
                    <td>$show[id_bobot]</td>
                    <td>$show[value]</td>
                    <td>$show[nilai]</td>
                    <td>$show[keterangan]</td>
                </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_skala" role="tabpanel" aria-labelledby="data_skala-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
                <th>PRA</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from multimoora_1");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                <tr>
                  <td>$show[id_matrix]</td>
                  <td>$show[id_alternatif]</td>
                  <td>$show[nama_alternatif]</td>
                  <td>$show[id_kriteria]</td>
                  <td>$show[nama_kriteria]</td>
                  <td>$show[id_bobot]</td>
                  <td>$show[value]</td>
                  <td>$show[nilai]</td>
                  <td>$show[keterangan]</td>
                  <td>$show[pra]</td>
                </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_bobot" role="tabpanel" aria-labelledby="data_bobot-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
                <th>PRA</th>
                <th>NORMALISASI</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from multimoora_2");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                <tr>
                  <td>$show[id_matrix]</td>
                  <td>$show[id_alternatif]</td>
                  <td>$show[nama_alternatif]</td>
                  <td>$show[id_kriteria]</td>
                  <td>$show[nama_kriteria]</td>
                  <td>$show[id_bobot]</td>
                  <td>$show[value]</td>
                  <td>$show[nilai]</td>
                  <td>$show[keterangan]</td>
                  <td>$show[pra]</td>
                  <td>$show[normalisasi]</td>
                </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_kriteria" role="tabpanel" aria-labelledby="data_kriteria-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
              <th>ID MATRIX</th>
                <th>ID ALTERNATIF</th>
                <th>NAMA ALTERNATIF</th>
                <th>ID KRITERIA</th>
                <th>NAMA KRITERIA</th>
                <th>ID BOBOT</th>
                <th>VALUE</th>
                <th>NILAI</th>
                <th>KETERANGAN</th>
                <th>PRA</th>
                <th>NORMALISASI</th>
                <th>NORMALISASI TERBOBOT</th>
              </tr>
            </thead>
            <tbody>
            <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from multimoora_3");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                <tr>
                  <td>$show[id_matrix]</td>
                  <td>$show[id_alternatif]</td>
                  <td>$show[nama_alternatif]</td>
                  <td>$show[id_kriteria]</td>
                  <td>$show[nama_kriteria]</td>
                  <td>$show[id_bobot]</td>
                  <td>$show[value]</td>
                  <td>$show[nilai]</td>
                  <td>$show[keterangan]</td>
                  <td>$show[pra]</td>
                  <td>$show[normalisasi]</td>
                  <td>$show[normalisasibobot]</td>
                </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
      <div class="tab-pane fade" id="data_matrix" role="tabpanel" aria-labelledby="data_matrix-tab">
        <table class="table table-dark table-hover">
          <table class="table">
            <thead>
              <tr>
                <th>ID ALTERNATIF</th>
                <th>HASIL</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include "config.php";
              $ambildata = mysqli_query($conn, "SELECT * from multimoora_4");
              while ($show = mysqli_fetch_array($ambildata)) {
                echo "
                <tr>
                    <td>$show[id_alternatif]</td>
                    <td>$show[hasil]</td>
                </tr>";
              }
              ?>
            </tbody>
          </table>
        </table>
      </div>
    </div>
  <?php } ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>