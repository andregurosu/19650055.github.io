<?php
include "config.php";

mysqli_query($conn,"insert into kriteria set
id_kriteria = 'NULL',
nama_kriteria = '$_POST[kriteria]'");

echo "Data Tersimpan";
header('location: dtkriteria.php');
?>