<?php
require_once('model/DataBaseConnection.php');
class DisciplinaModel{
	var $db;
	public function __construct(){
		$this->db = new DataBaseConnection();
	}
	
	public function getDisciplinasLecionadas($professorid){
		$this->db->connect();
		mysqli_set_charset($this->db,"utf8");
		$disciplinas = array();
		$query = "select * from disciplina where nProfessor = '".$professorid."'";
		$i = 0;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			while($row = mysqli_fetch_array($result)) {
				$disciplinas[$i] = array($row['numero'],$row['nome']);
				$i++;
			}
			return $disciplinas;
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'este professor não tem disciplinas';
			$this->db->disconnect();
			return false;
		}
	}
}
?>