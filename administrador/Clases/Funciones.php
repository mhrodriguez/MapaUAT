<?php
  require_once 'Conexion.php';//se manda llamar a la clase conexion

  class Instituciones
  {
    private $Nombre;
    
    //se crea una funcion con el metodo get para tomar los valores que se ingresan
    public function getNombre()
		{
			return $this->Nombre;
		}
    //metodo SET para pasar los valores a las variables
		public function setNombre($Nombre)
		{
			$this->Nombre = $Nombre;
		}
    //resive los datos que son enviados desde las variables de inicio
    function __construct($Nombre)
		{
			$this->Nombre = $Nombre;
		}
    // se manda llamar a la conexion y se le indica que haga un insert usando los valores que resivio del constructor
    public function InsertInstituciones()
		{
			$conexion = new Conexion();
			$Insert = $conexion->prepare('INSERT INTO INSTITUCION(nombre) VALUES (:nombre)');
			$Insert->bindParam(':nombre', $this->Nombre);
			$Insert->execute();
		}
  }//fin instituciones 

 class Fondos
  {
    private $Nombre;
    
    //se crea una funcion con el metodo get para tomar los valores que se ingresan
    public function getNombre()
		{
			return $this->Nombre;
		}
    //metodo SET para pasar los valores a las variables
		public function setNombre($Nombre)
		{
			$this->Nombre = $Nombre;
		}
    //resive los datos que son enviados desde las variables de inicio
    function __construct($Nombre)
		{
			$this->Nombre = $Nombre;
		}
    // se manda llamar a la conexion y se le indica que haga un insert usando los valores que resivio del constructor
    public function InsertFondos()
		{
			$conexion = new Conexion();
			$Insert = $conexion->prepare('INSERT INTO FONDO(nombre) VALUES (:nombre)');
			$Insert->bindParam(':nombre', $this->Nombre);
			$Insert->execute();
		}
  }//fin fondos 

class Territorios
  {
    private $Nombre;
    private $Latitud;
    private $Longitud;
    
    //se crea una funcion con el metodo get para tomar los valores que se ingresan
    public function getNombre()
		{
			return $this->Nombre;
		}
    public function getLatitud()
		{
			return $this->Latitud;
		}
    public function getLongitud()
		{
			return $this->Longitud;
		}
    //metodo SET para pasar los valores a las variables
		public function setNombre($Nombre)
		{
			$this->Nombre = $Nombre;
		}
    public function setLatitud($Latitud)
		{
			$this->Latitud = $Latitud;
		}
    public function setLongitud($Longitud)
		{
			$this->Longitud = $Longitud;
		}
    //resive los datos que son enviados desde las variables de inicio
    function __construct($Nombre, $Latitud, $Longitud)
		{
			$this->Nombre = $Nombre;
     		$this->Latitud = $Latitud;
      		$this->Longitud = $Longitud;
		}
    // se manda llamar a la conexion y se le indica que haga un insert usando los valores que resivio del constructor
    public function InsertTerritorios()
		{
			$conexion = new Conexion();
			$Insert = $conexion->prepare('INSERT INTO TERRITORIO(nombre,latitud,longitud) VALUES (:nombre,:latitud,:longitud)');
			$Insert->bindParam(':nombre', $this->Nombre);
      		$Insert->bindParam(':latitud', $this->Latitud);
      		$Insert->bindParam(':longitud', $this->Longitud);
			$Insert->execute();
		}
  }//fin Territorio 

 class Reponsables
  {
    private $Nombre;
    
    //se crea una funcion con el metodo get para tomar los valores que se ingresan
    public function getNombre()
		{
			return $this->Nombre;
		}
    //metodo SET para pasar los valores a las variables
		public function setNombre($Nombre)
		{
			$this->Nombre = $Nombre;
		}
    //resive los datos que son enviados desde las variables de inicio
    function __construct($Nombre)
		{
			$this->Nombre = $Nombre;
		}
    // se manda llamar a la conexion y se le indica que haga un insert usando los valores que resivio del constructor
    public function InsertResponsable()
		{
			$conexion = new Conexion();
			$Insert = $conexion->prepare('INSERT INTO  RESPONSABLE(full_name) VALUES (:nombre)');
			$Insert->bindParam(':nombre', $this->Nombre);
			$Insert->execute();
		}
  }//fin responsables

class AreasConocimiento
  {
    private $Nombre;
    
    //se crea una funcion con el metodo get para tomar los valores que se ingresan
    public function getNombre()
		{
			return $this->Nombre;
		}
    //metodo SET para pasar los valores a las variables
		public function setNombre($Nombre)
		{
			$this->Nombre = $Nombre;
		}
    //resive los datos que son enviados desde las variables de inicio
    function __construct($Nombre)
		{
			$this->Nombre = $Nombre;
		}
    // se manda llamar a la conexion y se le indica que haga un insert usando los valores que resivio del constructor
    public function InsertAreasConocimiento()
		{
			$conexion = new Conexion();
			$Insert = $conexion->prepare('INSERT INTO AREA_CONOCIMIENTO(nombre) VALUES (:nombre)');
			$Insert->bindParam(':nombre', $this->Nombre);
			$Insert->execute();
		}
  }//fin area de conocimiento


?>