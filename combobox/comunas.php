<?php  

	$id=$_GET['id'];

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='CALL LISTAR_COMUNAS('.$id.');';
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	$json_array["comunas"]=array();

	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			$comuna=array(
				'id'=>$row['ID'],
				'comuna'=>$row['COMUNA'],
			);
			array_push($json_array['comunas'],$comuna);
			//$json_array[]=$row;
		}
		echo json_encode($json_array);
	}	
?>	