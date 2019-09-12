<?php  

	$rut=$_GET['rut'];

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='CALL OBTENER_PERSONA('.$rut.');';
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	$json_array["personas"]=array();

	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			$comuna=array(
				'id'=>$row['ID_PERSONA'],
				'nombres'=>$row['NOMBRES'],
				'apellido_paterno'=>$row['APELLIDO_PATERNO'],
				'apellido_materno'=>$row['APELLIDO_MATERNO'],
				'fono'=>$row['FONO'],
				'correo'=>$row['CORREO']
			);
			array_push($json_array['personas'],$comuna);
			//$json_array[]=$row;
		}
		echo json_encode($json_array);
	}	
?>	