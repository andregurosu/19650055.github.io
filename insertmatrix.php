<?php
include "config.php";

mysqli_query($conn,"insert into matrixkeputusan set
id_matrix = 'NULL',
id_alternatif = '$_POST[alternatif]',
id_bobot = '$_POST[bobot]',
id_skala = '$_POST[skala]'
");

echo "Data Tersimpan";
header('location: dtmatrix.php');
?>