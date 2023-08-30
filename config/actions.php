<?php
define("server", "localhost");
define("username", "root");
define("password", "");
define("database", "taylor");
error_reporting(0);
class Actions{
	
	public $connection;

	function __construct(){
		$this->connection=mysqli_connect(server,username,password,database);
		if(!$this->connection){
			echo "Error in connection!";
		}
	}

	function select($columns,$table,$where){
		$query="SELECT ".$columns." from ".$table;
		if(!empty($where)){
			$query.=" where ".$where;
		}
		return mysqli_query($this->connection,$query);
	}

	function select_c($columns,$table,$where){
		$query="SELECT ".$columns." from ".$table;
		if(!empty($where)){
			$query.=" where ".$where;
		}
		echo $query;
	}

	function insert($table,$array){
		$keys=implode(",",array_keys($array));
		$values="'".implode("','",array_values($array))."'";
		$query="INSERT INTO ".$table." (".$keys.") VALUES (".$values.")";
		return mysqli_query($this->connection,$query);
	}

	function insert_c($table,$array){
		$keys=implode(",",array_keys($array));
		$values="'".implode("','",array_values($array))."'";
		$query="INSERT INTO ".$table." (".$keys.") VALUES (".$values.")";
		echo $query;
	}

	function update($table,$array,$where){
		foreach ($array as $key => $value) {
			$data.= "$key='".$this->connection->real_escape_string($value)."',";
		}
		$data=rtrim($data,",");
		$query="UPDATE ".$table." SET ".$data;
		if(!empty($where)){
			$query.=" WHERE ".$where;
		}
		// echo $query;
		return mysqli_query($this->connection,$query);
	}

	function update_c($table,$array,$where){
		foreach ($array as $key => $value) {
			$data.= "$key='".$this->connection->real_escape_string($value)."',";
		}
		$data=rtrim($data,",");
		$query="UPDATE ".$table." SET ".$data;
		if(!empty($where)){
			$query.=" WHERE ".$where;
		}
		echo $query;
	}

	function delete($table,$where){
		$query="DELETE FROM ".$table." WHERE ".$where;
		//echo $query;
		return mysqli_query($this->connection,$query);
	}

}

$object=new Actions();
?>