<?php require_once('../Connections/con_admin.php');
extract ($_REQUEST); 
mysql_select_db($database_con_admin, $con_admin);
$sql=("SELECT imagen,orden FROM logos WHERE id_lo=".$_REQUEST["id_lo"]."");
$r=mysql_query($sql, $con_admin) or die(mysql_error());
$filas=mysql_fetch_array($r);
	  
$imgn=$filas['imagen'];	
	  
$carpeta='../img/logos/';
	 
if (file_exists($carpeta.$imgn))
{
	unlink($carpeta.$imgn);
}
		      
mysql_select_db($database_con_admin, $con_admin);
mysql_query("DELETE FROM logos WHERE id_lo=".$_REQUEST["id_lo"]."", $con_admin);			 

echo  "<script language='javascript'>window.location='logo_editar-eliminar.php?menu=inicio.php'</script>";

?>
