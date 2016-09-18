<?php
require_once('model/DataBaseConnection.php');
class UserModel{
	var $db;
	public function __construct(){
		$this->db = new DataBaseConnection();
	}
	public function authentication($username, $password){
		if($this->getUserNameIsValid($username)){
			if($this->getPasswordIsValid($username, $password)){
				return 'correct';
			}else{return 'password fail';}
		}else{return 'username fail';}
	}
	public function checkIfIsAluno($username){
		$this->db->connect();
		if(!is_numeric($username)){
			return false;
		}
		$query = "select * from aluno where nUser = ".$username;
		$result = mysqli_query($this->db->getConnection(), $query);
		if(mysqli_num_rows($result) != 0){
			$row = mysqli_fetch_array($result);
			$this->db->disconnect();
			return true;
		}else{
			$this->db->disconnect();
			return false;
		}
	}
	public function checkIfIsProfessor($username){
		$this->db->connect();
		if(!is_numeric($username)){
			return false;
		}
		$query = "select * from professor where nUser = ".$username;
		$result = mysqli_query($this->db->getConnection(), $query);
		if(mysqli_num_rows($result) != 0){
			$row = mysqli_fetch_array($result);
			$this->db->disconnect();
			return true;
		}else{
			
			$this->db->disconnect();
			return false;
		}
	}
	public function getUserName($username){
		$this->db->connect();
		$query = "SELECT nome FROM user WHERE numero = ".$username;
		$result = mysqli_query($this->db->getConnection(), $query);
		if($result){
			$row = mysqli_fetch_array($result);
			$this->db->disconnect();
			return $row['nome'];
		} else{
			$this->db->disconnect();
			return 'error';
		}
	}
	public function getProfessorID($username){
		$this->db->connect();
		$query = "SELECT numero FROM `professor` WHERE nUser = ".$username;
		$result = mysqli_query($this->db->getConnection(), $query);
		if($result){
			$row = mysqli_fetch_array($result);
			$this->db->disconnect();
			return $row['numero'];
		} else{
			$this->db->disconnect();
			return 'error';
		}
	}
	public function getAlunoID($username){
		$this->db->connect();
		$query = "SELECT numero FROM `aluno` WHERE nUser = ".$username;
		$result = mysqli_query($this->db->getConnection(), $query);
		if($result){
			$row = mysqli_fetch_array($result);
			$this->db->disconnect();
			return $row['numero'];
		} else{
			$this->db->disconnect();
			return 'error';
		}
	}
	private function getUserNameIsValid($username){
		$this->db->connect();
		if(is_numeric($username)){
			$username = (int)$username;
		}else{
			$this->db->disconnect();
			return false;
		}
		$query = "SELECT * FROM user WHERE numero = ".$username;
		$result = mysqli_query($this->db->getConnection(), $query);
		if(mysqli_num_rows($result) != 0){
			$row = mysqli_fetch_array($result);
			$this->db->disconnect();
			return true;
		} else{
			$this->db->disconnect();
			return false;
		}
	}
	private function getPasswordIsValid($username, $password){
		$this->db->connect();
		$query = "select * from user where numero = ".$username." and passe = '".$password."'";
		$result = mysqli_query($this->db->getConnection(), $query);
		if(mysqli_num_rows($result) != 0){
			$row = mysqli_fetch_array($result);
			$this->db->disconnect();
			return true;
		} else{
			$this->db->disconnect();
			return false;
		}
	}
}
?>