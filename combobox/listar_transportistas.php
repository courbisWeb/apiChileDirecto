<?php  
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='CALL LISTAR_TRANSPORTISTAS();';
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	$json_array["transportistas"]=array();

	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			$region=array(
				'id'=>$row['ID_USUARIO'],
				'nombres'=>$row['NOMBRES'],
				'apellido_paterno'=>$row['APELLIDO_PATERNO'],
				'apellido_materno'=>$row['APELLIDO_MATERNO']
			);
			array_push($json_array['transportistas'],$region);
			//$json_array[]=$row;
		}
		echo json_encode($json_array);
	}	
?>	