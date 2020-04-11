<?php 
require('core/core.php');
if(isset($_GET['view'])){
	if(file_exists('core/controllers/'.strtolower($_GET['view']).'Controllers.php')){
		include('core/controllers/'.strtolower($_GET['view']).'Controllers.php');
		/*if(preg_match('/dash/i', strtolower($_GET['view']))){
		    if(isset($_SESSION['usuario'],$_SESSION['id'])){
		    	include('core/controllers/'.strtolower($_GET['view']).'Controllers.php');
			  }else{
			  	include('core/controllers/homeControllers.php');
			  }
		}else{
			if(isset($_SESSION['usuario'],$_SESSION['id'])){
				if(strtolower($_GET['view']) == 'login'){
					include('core/controllers/dasharticulos.php');
				}else{
					include('core/controllers/'.strtolower($_GET['view']).'Controllers.php');
				}	    	
		  }else{
		  	include('core/controllers/'.strtolower($_GET['view']).'Controllers.php');
		  }			
		}	*/	
	}else{
		echo '404 not found';
	}	
}else{
	include('core/controllers/homeControllers.php');	
}

?>