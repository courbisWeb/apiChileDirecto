	<?php  
	$id_usuario=$_GET['id_usuario'];
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='SELECT CHILEDIRECTO.ELIMINAR_USUARIO
			('.$id_usuario.') AS RETORNO;';
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	$json_array["retornos"]=array();

	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			echo $row['RETORNO'];
			
		}
	}	
?>	