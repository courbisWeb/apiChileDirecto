<?php  

	$id=$_GET['id'];

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('../BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='CALL LISTAR_PROVINCIAS('.$id.');';
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	$json_array["provincias"]=array();

	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			$provincia=array(
				'id'=>$row['ID'],
				'provincia'=>$row['PROVINCIA'],
			);
			array_push($json_array['provincias'],$provincia);
			//$json_array[]=$row;
		}
		echo json_encode($json_array);
	}	
?>	