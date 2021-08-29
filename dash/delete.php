<?php
require_once("db.php");
$sql = "DELETE FROM bus_info WHERE tb_id='" . $_GET["tb_id"] . "'";
mysqli_query($conn,$sql);
header("Location:dash.php");
?>