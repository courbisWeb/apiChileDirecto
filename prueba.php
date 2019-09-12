<?php  

	$id=$_GET['id'];

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('./BD/Conexion.php');
	mysqli_set_charset($conn, 'utf8');
	/*query*/
	$sql='SELECT * FROM comunas where provincia_id ='.$id;
	$result = $conn->query($sql);
	/*fin query*/
	$json_array=array();
	if($result->num_rows>0){
		//die('Si se pudo');
		while($row=$result->fetch_assoc()){
			$json_array[]=$row;
			//print 'id= '.$row['ID_REGION'].' , '.$row['NOMBRE_REGION']."\n";
		}
		echo json_encode($json_array);
	}
	else{
		die('Nunca fue');	
	}

	

	
?>	