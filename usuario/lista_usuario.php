<?php  
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='CALL LISTAR_USUARIOS();';
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	$json_array["usuarios"]=array();

	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			$region=array(
				'id'=>$row['ID'],
				'rut'=>$row['RUT'],
				'nombres'=>$row['NOMBRES'],
				'apellido_paterno'=>$row['APELLIDO_PATERNO'],
				'apellido_materno'=>$row['APELLIDO_MATERNO'],
				'direccion'=>$row['DIRECCION'],
				'id_region'=>$row['ID_REGION'],
				'region'=>$row['REGION'],
				'id_provincia'=>$row['ID_PROVINCIA'],
				'provincia'=>$row['PROVINCIA'],
				'id_comuna'=>$row['ID_COMUNA'],
				'comuna'=>$row['COMUNA'],
				'fono'=>$row['FONO'],
				'correo'=>$row['CORREO'],
				'id_tipo_usuario'=>$row['ID_TIPO_USUARIO'],
				'tipo_usuario'=>$row['TIPO_USUARIO'],
				'usuario'=>$row['USUARIO'],
				'contrasena'=>$row['CONTRASENA'],
				'id_estado'=>$row['ID_ESTADO'],
				'estado'=>$row['ESTADO']
			);
			array_push($json_array['usuarios'],$region);
			//$json_array[]=$row;
		}
		echo json_encode($json_array);
	}	
?>	
