<?php
include "config.php";

mysqli_query($conn,"insert into bobot set
id_bobot = 'NULL',
id_kriteria = '$_POST[kriteria]',
value = '$_POST[bobot]'");

echo "Data Tersimpan";
header('location: dtbobot.php');
?>