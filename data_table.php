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
              <li><a class="dropdown-item" href="result_table.php?metode=multimoora">MULTIMOORA</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 500px;">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="data_alternatif-tab" data-bs-toggle="tab" data-bs-target="#data_alternatif" type="button" role="tab" aria-controls="data_alternatif" aria-selected="true">data_alternatif</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="data_skala-tab" data-bs-toggle="tab" data-bs-target="#data_skala" type="button" role="tab" aria-controls="data_skala" aria-selected="false">data_skala</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="data_bobot-tab" data-bs-toggle="tab" data-bs-target="#data_bobot" type="button" role="tab" aria-controls="data_bobot" aria-selected="false">data_bobot</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="data_kriteria-tab" data-bs-toggle="tab" data-bs-target="#data_kriteria" type="button" role="tab" aria-controls="data_kriteria" aria-selected="false">data_kriteria</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="data_matrix-tab" data-bs-toggle="tab" data-bs-target="#data_matrix" type="button" role="tab" aria-controls="data_matrix" aria-selected="false">data_matrix</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="data_alternatif" role="tabpanel" aria-labelledby="data_alternatif-tab">
      <table class="table table-dark table-hover">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID ALTERNATIF</th>
              <th scope="col">NAMA ALTERNATIF</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include "config.php";
            $ambildata = mysqli_query($conn, "SELECT * from alternatif");
            while ($show = mysqli_fetch_array($ambildata)) {
              echo "
                    <tr>
                        <td>$show[id_alternatif]</td>
                        <td>$show[nama_alternatif]</td>
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
                    <th scope="col">ID SKALA</th>
                    <th scope="col">VALUE</th>
                    <th scope="col">KETERANGAN</th>
                </tr>
          </thead>
          <tbody>
          <?php
                include "config.php";
                $ambildata = mysqli_query($conn, "SELECT * from skala");
                while ($show = mysqli_fetch_array($ambildata)){
                    echo "
                    <tr>
                        <td>$show[id_skala]</td>
                        <td>$show[value]</td>
                        <td>$show[keterangan]</td>
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
            <th>ID BOBOT</th>
                    <th>ID KRITERIA</th>
                    <th>VALUE</th>
            </tr>
          </thead>
          <tbody>
          <?php
                include "config.php";
                $ambildata = mysqli_query($conn, "SELECT * from bobot");
                while ($show = mysqli_fetch_array($ambildata)){
                    echo "
                    <tr>
                        <td>$show[id_bobot]</td>
                        <td>$show[id_kriteria]</td>
                        <td>$show[value]</td>
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
            <th>ID KRITERIA</th>
                    <th>NAMA KRITERIA</th>
            </tr>
          </thead>
          <tbody>
          <?php
                include "config.php";
                $ambildata = mysqli_query($conn, "SELECT * from kriteria");
                while ($show = mysqli_fetch_array($ambildata)){
                    echo "
                    <tr>
                        <td>$show[id_kriteria]</td>
                        <td>$show[nama_kriteria]</td>
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
            <th>ID MATRIX</th>
                    <th>ID ALTERNATIF</th>
                    <th>ID BOBOT</th>
                    <th>ID SKALA</th>
            </tr>
          </thead>
          <tbody>
          <?php
                include "config.php";
                $ambildata = mysqli_query($conn, "SELECT * from matrixkeputusan");
                while ($show = mysqli_fetch_array($ambildata)){
                    echo "
                    <tr>
                        <td>$show[id_matrix]</td>
                        <td>$show[id_alternatif]</td>
                        <td>$show[id_bobot]</td>
                        <td>$show[id_skala]</td>
                    </tr>";
                }
                ?>
          </tbody>
        </table>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>