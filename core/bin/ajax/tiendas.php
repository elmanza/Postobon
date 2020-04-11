<?php 

header('Content-Type: text/html; charset=utf-8');
if(!isset($_GET['key'])){
	echo "ERROR MESSAGE: You don't access to this document.";
	$_GET['key'] = '';
}elseif($_GET['key']!="getciudades" && $_GET['key']!="getbarrios" && $_GET['key']!="getalmacenes" && $_GET['key']!="inserttienda" && $_GET['key']!="getalmacenesnews" && $_GET['key']!="searchposition"){
	echo "ERROR MESSAGE: You don't access to this document.";
}else{
	$datetimenow = date('Y-m-d H:i:s');
	// SOLICITUDES DEL INDEX
	if($_GET['key']=="getbarrios"){
		$con = new Conexion();
		$con->setCharset();
		$select = "SELECT barrio, COUNT(barrio) AS total FROM `datafinal` WHERE ciudad = '".$_POST['ciudad']."' GROUP BY barrio";
		$negocios = mysqli_query($con, $select);
		if($negocios->num_rows > 0){
			while($fila =  mysqli_fetch_object($negocios)) {
				$rta[]=$fila;
			}
			echo json_encode(['respuesta' => true, 'info' => $rta]);
		}else{
			echo json_encode(['respuesta' => false, 'info' => 'No Barrios']);
		}	
	}
	if($_GET['key']=="getciudades"){
		$con = new Conexion();
		$con->setCharset();
		$select = "SELECT ciudad, COUNT(ciudad) AS negocios FROM `datafinal` GROUP BY ciudad";
		$ciudades = mysqli_query($con, $select);
		if($ciudades->num_rows > 0){
			while($fila =  mysqli_fetch_object($ciudades)) {
				$rta[]=$fila;
			}
			echo json_encode(['respuesta' => true, 'info' => $rta]);
		}else{
			echo json_encode(['respuesta' => false, 'info' => 'No Barrios']);
		}	
	}
	if($_GET['key']=="getalmacenes"){
		$con = new Conexion();
		$con->setCharset();
		$select = "SELECT * FROM `datafinal` WHERE ciudad = '".$_POST['ciudad']."' AND barrio = '".$_POST['tipo']."'";
		$tiendas = mysqli_query($con, $select);
		if($tiendas->num_rows > 0){
			while($fila =  mysqli_fetch_object($tiendas)) {
				$rta[]=$fila;
			}
			echo json_encode(['respuesta' => true, 'info' => $rta]);
		}else{
			echo json_encode(['respuesta' => false, 'info' => 'No hay tiendas']);
		}	
	}

	// SOLICITUDES DE REGISTRO

	if($_GET['key']=="inserttienda"){
		$con = new Conexion();
		$con->setCharset();
		$namenegocio =  $con->real_escape_string($_POST['namenegocio']);
		$nameperson =  $con->real_escape_string($_POST['nameperson']);
		$email =  $con->real_escape_string($_POST['email']);
		$telefono =  $con->real_escape_string($_POST['telefono']);
		$data_political =  $con->real_escape_string($_POST['data_political']);
		$place_state =  $con->real_escape_string($_POST['place-state']);
		$place_city =  $con->real_escape_string($_POST['place-city']);
		$place_neighborhood =  $con->real_escape_string($_POST['place-neighborhood']);
		$neighborhood = strtoupper($place_neighborhood);  
		$address =  $con->real_escape_string($_POST['address']);
		$domicilio =  $con->real_escape_string($_POST['domicilio']);
		$teldomicilios =  $con->real_escape_string($_POST['teldomicilios']);
		$erescliente =  $con->real_escape_string($_POST['erescliente']);
		if($erescliente == "si"){
			$code_postobon =  $con->real_escape_string($_POST['code_postobon']);
		}else{$code_postobon = "";}
		

		$select = "INSERT INTO `almacenes`(`id`, `erescliente`, `cod_postobon`, `tipocliente`, `departamento`, `ciudad`, `nombre`, `domicilio`, `telefono_1`, `telefono_2`, `telefono_3`, `telefono_4`, `telefono_5`, `direccion`, `barrio`, `longitud`, `latitud`, `representante`, `email`, `telcontacto`, `aceptatratamientodatos`, `estado`, `creado`) VALUES (NULL, '".$erescliente."', '".$code_postobon."', 'nuevo', '".$place_state."', '".$place_city."', '".$namenegocio."', '".$domicilio."', '".$teldomicilios."', '', '', '', '', '".$address."', '".$neighborhood."', '0', '0', '".$nameperson."', '".$email."', '".$telefono."', '".$data_political."', 'en espera', '".$datetimenow."')";
		$resul = mysqli_query($con, $select);
		if($resul){echo json_encode(['respuesta' => true, 'info' => "Insertado correctamente"]);}else{echo json_encode(['respuesta' => false, 'info' => 'Error de insercción.. Comunicate con soporte técnico.']);}
	}

	if($_GET['key']=="getalmacenesnews"){
		$con = new Conexion();
		$con->setCharset();
		$select = "SELECT * FROM `almacenes` WHERE `almacenes`.`tipocliente` = 'nuevo'";
		$tiendas = mysqli_query($con, $select);
		if($tiendas->num_rows > 0){
			while($fila =  mysqli_fetch_object($tiendas)) {
				$rta[]=$fila;
			}
			echo json_encode(['respuesta' => true, 'info' => $rta]);
		}else{
			echo json_encode(['respuesta' => false, 'info' => 'No hay tiendas']);
		}	
	}


	if($_GET['key']=="searchposition"){
		$con = new Conexion();
		$con->setCharset();
		$select = "SELECT
							    *, (
							      6371 * acos (
							      cos ( radians(".$_POST['lat'].") )
							      * cos( radians( latitud ) )
							      * cos( radians( longitud ) - radians(".$_POST['lng']." ) )
							      + sin ( radians(".$_POST['lat']."))
							      * sin( radians( latitud ) )
							    )
							) AS distance
							FROM `datafinal`
							HAVING distance < 2
							ORDER BY distance";
		$tiendas = mysqli_query($con, $select);
		if($tiendas->num_rows > 0){
			while($fila =  mysqli_fetch_object($tiendas)) {
				$rta[]=$fila;
			}
			echo json_encode(['respuesta' => true, 'info' => $rta]);
		}else{
			echo json_encode(['respuesta' => false, 'info' => 'No hay tiendas']);
		}	
	}

	
}



//$con->insert_id


?>