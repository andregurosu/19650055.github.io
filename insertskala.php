<?php
include "config.php";

mysqli_query($conn,"insert into skala set
id_skala = 'NULL',
value = '$_POST[value]',
keterangan = '$_POST[keterangan]'
");

echo "Data Tersimpan";
header('location: dtskala.php');
?>