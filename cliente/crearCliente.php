<?php  

	$rut=$_POST['rut'];
	$nombres=$_POST['nombres'];
	$a_paterno=$_POST['a_paterno'];
	$a_materno=$_POST['a_materno'];
	$direccion=$_POST['direccion'];
	$region=$_POST['region'];
	$provincia=$_POST['provincia'];
	$comuna=$_POST['comuna'];
	$fono=$_POST['fono'];
	$correo=$_POST['correo'];


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='SELECT CHILEDIRECTO.AGREGA_CLIENTE('.$rut.', '.$nombres.', '.$a_paterno.', '.$a_materno.', '.$direccion.', '.$region.', '.$provincia.', '.$comuna.', '.$fono.', '.$correo.') AS RETORNO;';
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	$json_array["retorno"]=array();

	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			$retorno=array(
				'RETORNO'=>$row['RETORNO']
			);
			array_push($json_array['retorno'],$retorno);
			//$json_array[]=$row;
		}
		echo json_encode($json_array);
	}	
?>	