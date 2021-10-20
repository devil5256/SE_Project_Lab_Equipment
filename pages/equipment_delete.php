<?php
// session_start();
include("connect.php");
?>

<?php

$adminid="";

  $equipid=$_GET["Id"];
  
  
  $qry="delete from equipment where E_ID ='$equipid'";

  // echo $qry;
  
  $fire=$mysqli->query($qry);

  echo ("<script>location.href='Equipment_admin.php'</script>");




?>
