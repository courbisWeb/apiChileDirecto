	<?php  
	$id_usuario=$_GET['id_usuario'];
	$rut=$_GET['rut'];
	$nombres=$_GET['nombres'];
	$apellido_paterno=$_GET['apellido_paterno'];
	$apellido_materno=$_GET['apellido_materno'];
	$direccion=$_GET['direccion'];
	$id_region=$_GET['id_region'];
	$id_provincia=$_GET['id_provincia'];
	$id_comuna=$_GET['id_comuna'];
	$fono=$_GET['fono'];
	$correo=$_GET['correo'];
	$id_tipo=$_GET['id_tipo'];
	$id_estado=$_GET['id_estado'];
	$nombre_usuario=$_GET['nombre_usuario'];
	$contrasena=$_GET['contrasena'];

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='SELECT CHILEDIRECTO.ACTUALIZAR_USUARIO
			('.$id_usuario.'
			,TRIM("'.$rut.'")
			,"'.$nombres.'"
			,"'.$apellido_paterno.'"
			,"'.$apellido_materno.'"
			,"'.$direccion.'"
			,'.$id_region.'
			,'.$id_provincia.'
			,'.$id_comuna.'
			,"'.$fono.'"
			,"'.$correo.'"
			,'.$id_tipo.'
			,'.$id_estado.'
			,"'.$nombre_usuario.'"
			,"'.$contrasena.'"
			) AS RETORNO;';
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