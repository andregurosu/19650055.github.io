<?php
include "config.php";

mysqli_query($conn,"insert into alternatif set
id_alternatif = 'NULL',
nama_alternatif = '$_POST[alternatif]'");
echo "Data Tersimpan";
header('location: dtalternatif.php');

?>