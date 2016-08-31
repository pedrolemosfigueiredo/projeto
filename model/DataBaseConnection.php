<?php
class DataBaseConnection{
	var $con;
	public function __construct(){
		
	}
	
	function connect(){
		$this->con = mysqli_connect("localhost","root","", "projeto");
		if(!$this->con){
			die('Could not connect:'.mysql_error());
			echo 'erro';
		} else{
			//mysqli_select_db($this->con, "projetopcr");
		}
	}
	function disconnect(){
		mysqli_close($this->con);
	}
	
	public function getConnection(){
		return $this->con;
	}
}
?>