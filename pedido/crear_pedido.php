	<?php  

	$rut=$_GET['rut'];
	$nombres=$_GET['nombres'];
	$apellido_paterno=$_GET['apellido_paterno'];
	$apellido_materno=$_GET['apellido_materno'];
	$fono=$_GET['fono'];
	$correo=$_GET['correo'];
	$id_transportista=$_GET['id_transportista'];
	$direccion_ida=$_GET['direccion_ida'];
	$id_region_ida=$_GET['id_region_ida'];
	$id_provincia_ida=$_GET['id_provincia_ida'];
	$id_comuna_ida=$_GET['id_comuna_ida'];
	$direccion_vuelta=$_GET['direccion_vuelta'];
	$id_region_vuelta=$_GET['id_region_vuelta'];
	$id_provincia_vuelta=$_GET['id_provincia_vuelta'];
	$id_comuna_vuelta=$_GET['id_comuna_vuelta'];
	$centro_costo=$_GET['centro_costo'];
	$fecha_ingreso=$_GET['fecha_ingreso'];
	$fecha_carga=$_GET['fecha_carga'];
	$fecha_rendicion=$_GET['fecha_rendicion'];
	$precio=$_GET['precio'];

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='SELECT CHILEDIRECTO.CREAR_PEDIDO
			("
			'.$rut.'"
			,"'.$nombres.'"
			,"'.$apellido_paterno.'"
			,"'.$apellido_materno.'"
			,"'.$fono.'"
			,"'.$correo.'"
			,'.$id_transportista.'
			,"'.$direccion_ida.'"
			,'.$id_region_ida.'
			,'.$id_provincia_ida.'
			,'.$id_comuna_ida.'
			,"'.$direccion_vuelta.'"
			,'.$id_region_vuelta.'
			,'.$id_provincia_vuelta.'
			,'.$id_comuna_vuelta.'
			,"'.$centro_costo.'"
			,"'.$fecha_ingreso.'"
			,"'.$fecha_carga.'"
			,"'.$fecha_rendicion.'"
			,'.$precio.'
			) AS RETORNO;';
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	$json_array["retornos"]=array();

	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			$comuna=array(
				'retorno'=>$row['RETORNO']
			);
			array_push($json_array['retornos'],$comuna);
			//$json_array[]=$row;
		}
		echo json_encode($json_array);
	}	
?>	