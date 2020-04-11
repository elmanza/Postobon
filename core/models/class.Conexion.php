<?php

class Conexion extends Mysqli
{
	private $host;
	private $user;
	private $pass;
	private $db;

	public function __construct()
	{
		$this->host = CONF_DB_HOST;
		$this->user = CONF_DB_USER;
		$this->pass = CONF_DB_PASS;
		$this->db = CONF_DB_DATABASE;
		parent::__construct($this->host,$this->user, $this->pass, $this->db);
		//$this->connect_errno ? die('Error en la conexion de la base de datos');
	}

	public function setCharset(){
		$this->set_charset(CONF_DB_CHARSET);
	}

	public function rows($query){
		$this->mysql_num_rows($query);
	}

	public function liberar($query){
		$this->mysql_free_result($query);
	}

	public function recorrer($query){
		$this->mysql_fetch_array($query);
	}
}




?>