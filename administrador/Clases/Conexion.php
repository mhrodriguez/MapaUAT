<?php 
	/**
	* clase para realizar la conexion a la BD
	*/
	class Conexion extends PDO
	{
		private $tipo_de_base = 'mysql';
		private $host = 'localhost';
		private $nombre_de_base = 'uat_geolocalizacion_proy';
		private $usuario = 'root';
		private $contrasena = '';
		
		function __construct()
		{
			try {
				parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena, array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'UTF8\''));
				
			} catch (PDOException $e) {
				echo 'Ha Surgido un Error. Detalle:'.$e->getMessage();
				exit;
				
			}
		}
	}
?>