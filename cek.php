<?php
session_start();
include "config.php";
$username =$_POST['user'];

$login = $db->query("select * from tb_pilih where tanda_terima = '$user'") or die ("gagal".mysql_error());
$hasil = mysqli_num_rows($login);
if ($hasil==1){
	header(""location:index.php?m=hasil_voting");");
}	
else {
	header("location:index.php");
}
	
?>
