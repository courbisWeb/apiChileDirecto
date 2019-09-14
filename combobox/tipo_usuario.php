<?php  
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='CALL LISTAR_TIP_USUARIOS();';
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	$json_array["tipo_usuarios"]=array();

	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			$region=array(
				'id'=>$row['ID_TIPO_USUARIO'],
				'tipo_usuario'=>$row['TIPO_USUARIO'],
			);
			array_push($json_array['tipo_usuarios'],$region);
			//$json_array[]=$row;
		}
		echo json_encode($json_array);
	}	
?>	