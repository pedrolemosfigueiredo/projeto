<?php
require_once('model/DataBaseConnection.php');
class DisciplinaModel{
	var $db;
	public function __construct(){
		$this->db = new DataBaseConnection();
	}
	public function getDisciplinaFromEvaluation($evaluation){
		$this->db->connect();
		$disciplinas = array();
		$query = "select nDisciplina from evaluation where numero = ".$evaluation;
		$result = mysqli_query($this->db->getConnection(), $query);
		$this->db->disconnect();
		if($result){
			$row = $result->fetch_assoc();
			return $this->getDisciplinaName($row['nDisciplina']);
		}
	}
	public function($nDisciplina){
		$this->db->connect();
		$disciplinas = array();
		$query = "select nome from disciplina where numero = ".$nDisciplina;
		$result = mysqli_query($this->db->getConnection(), $query);
		$this->db->disconnect();
		if($result){
			$row = $result->fetch_assoc();
			return ($row['nome']);
		}
	}
	public function getDisciplinasLecionadas($professorid){
		$this->db->connect();
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
	public function getEvaluations($disciplina){
		$this->db->connect();
		$evaluations = array();
		$query = "select * from avaliacao where nDisciplina = ".$disciplina;
		$i = 0;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			while($row = mysqli_fetch_array($result)) {
				$evaluations[$i] = array($row['numero'],$row['nome'],$row['tipo']);
				$i++;
			}
			return $evaluations;
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'Esta disciplina não é lecionada por este professor';
			$this->db->disconnect();
			return false;
		}
	}
	public function drawEvaluationForm($evaluation){
		
	}
}
?>