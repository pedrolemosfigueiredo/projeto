<?php
require_once('model/DataBaseConnection.php');
	class UserModel{
		$var db;
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
		public funtion checkIfIsAluno($username){
			$this->db->connect();
			$query = "select * from 'aluno' where nUser = '".$username."'";
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
			$query = "select * from 'professor' where nUser = '".$username."'";
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
		private function getUserNameIsValid($username){
			$this->db->connect();
			$query = "SELECT * FROM `user` WHERE numero = '".$username."'";
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
			$query = "select * from user where numero = '".$username."' and passe = '".$password."'";
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