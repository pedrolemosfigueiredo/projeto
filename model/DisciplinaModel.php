<?php
require_once('model/DataBaseConnection.php');
class DisciplinaModel{
	var $db;
	public function __construct(){
		$this->db = new DataBaseConnection();
	}
	
	public function getDisciplinasLecionadas($professorid){
		$this->db->connect();
		$disciplinas = array();
		$query = "select * from 'disciplina' where nProfessor = '".$professorid."'";
		$i = 0;
		$result = mysqli_query($this->bd->getConnection(), $sql);
		if ($result) {
			$this->db->disconnect();
			while($row = mysqli_fetch_array($result)) {
				$disciplinas[$i] = array($row['idDisciplina']=>$row['nomeDisciplina']);
				$i++;
			}
			return $disciplinas;
		} else {
			printf("Errormessage: %s\n", mysqli_error($this->bd->getConnection()));
			$this->db->disconnect();
			return false;
		}
	}
}
?>