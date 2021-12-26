<?php
include_once('config.php');
?>
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
      <button class="nav-link active" id="data_alternatif-tab" data-bs-toggle="tab" data-bs-target="#data_alternatif" type="button" role="tab" aria-controls="data_alternatif" aria-selected="true">form_alternatif</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="data_skala-tab" data-bs-toggle="tab" data-bs-target="#data_skala" type="button" role="tab" aria-controls="data_skala" aria-selected="false">form_skala</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="data_bobot-tab" data-bs-toggle="tab" data-bs-target="#data_bobot" type="button" role="tab" aria-controls="data_bobot" aria-selected="false">form_bobot</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="data_kriteria-tab" data-bs-toggle="tab" data-bs-target="#data_kriteria" type="button" role="tab" aria-controls="data_kriteria" aria-selected="false">form_kriteria</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="data_matrix-tab" data-bs-toggle="tab" data-bs-target="#data_matrix" type="button" role="tab" aria-controls="data_matrix" aria-selected="false">form_matrix</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="data_alternatif" role="tabpanel" aria-labelledby="data_alternatif-tab">
    <form action="insertalternatif.php" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Nama Alternatif</label>
          <input name="alternatif" type="text" class="form-control" id="" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="tab-pane fade" id="data_skala" role="tabpanel" aria-labelledby="data_skala-tab">
    <form action="insertskala.php" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Value</label>
          <input name="value" type="text" class="form-control" id="" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Keterangan</label>
          <input name="keterangan" type="text" class="form-control" id="" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="tab-pane fade" id="data_bobot" role="tabpanel" aria-labelledby="data_bobot-tab">
    <form action="insertbobot.php" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Nama Kriteria</label>
          <select name="kriteria" id="kriteria" class="select" required>
                        <option value="">- Pilih - </option>
                        <?php
                        $sql_kriteria = mysqli_query($conn, "SELECT * FROM kriteria") or die (mysqli_error($conn));
                        while($data_kriteria = mysqli_fetch_array($sql_kriteria)){
                            echo '<option value ="'.$data_kriteria['id_kriteria'].'">'.$data_kriteria['nama_kriteria'].'</option>';
                        }
                        ?>
                    </select>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Bobot</label>
          <input name="bobot" type="text" class="form-control" id="" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="tab-pane fade" id="data_kriteria" role="tabpanel" aria-labelledby="data_kriteria-tab">
    <form action="insertkriteria.php" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Kriteria</label>
          <input name="kriteria" type="text" class="form-control" id="" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <div class="tab-pane fade" id="data_matrix" role="tabpanel" aria-labelledby="data_matrix-tab">
    <form action="insertmatrix.php" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Nama Alternatif</label>
          <select name="alternatif" id="alternatif" class="select" required>
                        <option value="">- Alternatif - </option>
                        <?php
                        $sql_alternatif = mysqli_query($conn, "SELECT * FROM alternatif") or die (mysqli_error($conn));
                        while($data_alternatif = mysqli_fetch_array($sql_alternatif)){
                            echo '<option value ="'.$data_alternatif['id_alternatif'].'">'.$data_alternatif['nama_alternatif'].'</option>';
                        }
                        ?>
                    </select>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Bobot</label>
          <select name="bobot" id="bobot" class="select" required>
                        <option value="">- Bobot - </option>
                        <?php
                        $sql_bobot = mysqli_query($conn, "SELECT * FROM bobot") or die (mysqli_error($conn));
                        while($data_bobot = mysqli_fetch_array($sql_bobot)){
                            echo '<option value ="'.$data_bobot['id_bobot'].'">'.$data_bobot['value'].'</option>';
                        }
                        ?>
                    </select>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Skala</label>
          <select name="skala" id="skala" class="select" required>
                        <option value="">- Skala - </option>
                        <?php
                        $sql_skala = mysqli_query($conn, "SELECT * FROM skala") or die (mysqli_error($conn));
                        while($data_skala = mysqli_fetch_array($sql_skala)){
                            echo '<option value ="'.$data_skala['id_skala'].'">'.$data_skala['value'].' - '.$data_skala['keterangan'].'</option>';
                        }
                        ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>