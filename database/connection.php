<?php 
class Connection {
    
    private $host = "190.13.136.238";
    private $db_name = "db_portal_dte";
    private $user = "helpcom_dte";
    private $password = "niclabs56dte33";
    private $port = "63306";
    private $connection;

    public function __construct() {
    /*    
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $this->connection = new PDO("mysql:host=".$this->host.";port=".$this->port."; dbname=".$this->db_name, $this->user, $this->password, $options);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //$this->connection->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , 'SET sql_mode="TRADITIONAL');
        	return $this->connection;
        	echo 'Success';

        }catch (Exception $e){
        	$this->connection = "Error de conexion";
            echo "El error de conexión es: ". $e->getMessage();
        }*/
    }

    public function connect() {

    	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    	$dns = "mysql:host=".$this->host.";port=".$this->port."; dbname=".$this->db_name;
        try{
            $pdo = new PDO($dns, $this->user, $this->password, $options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        	$pdo->exec('set session sql_mode = traditional');
        	$pdo->exec('set session innodb_strict_mode = on');
        	//echo 'Success';
        	return $pdo;

        }catch (PDOExeption $e){
        	//$this->connection = "Error de conexion";
            echo "El error de conexión es: ". $e->getMessage();
        }

    }
}

//$connection = new Connection(); 