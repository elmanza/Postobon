<?php 

if($_POST){
	require('core/core.php');
	switch (isset($_GET['mode']) ? $_GET['mode'] : null) {
		case 'tiendas':
			require('core/bin/ajax/tiendas.php');
			break;
		
		default:
		echo 'Opción indefinida';
			//header('location: index.php');
			break;
	}
}else{
	echo 'Sin información de $_POST';
	
}

?>