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
	public function getDisciplinaName($nDisciplina){
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
	public function getDisciplinasAluno($alunoID){
		$this->db->connect();
		$disciplinas = array();
		$disciplinasID = $this->getDisciplinasIDsFromADs($alunoID);
		$query = "select * from disciplina where disciplina.numero in (select alunodisciplina.nDisciplina from alunodisciplina where alunodisciplina.nAluno = ".$alunoID.")";
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
	public function getNotas($evaluation){
		$this->db->connect();
		$notas = array();
		$query = "select * from nota where nAvaliacao = ".$evaluation;
		$i = 0;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			while($row = mysqli_fetch_array($result)) {
				$nomeAluno = $this->getNomeAlunoWithADID($row['nAlunoDisciplina']);
				$notas[$i] = array($row['numero'], $row['nota'], $nomeAluno);
				$i++;
			}
			return $notas;
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'Esta disciplina não é lecionada por este professor';
			$this->db->disconnect();
			return false;
		}
	}
	private function getAlunoWithAD($alunoDisciplina){
		$this->db->connect();
		$query = "select nAluno from alunodisciplina where numero = ".$alunoDisciplina;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['nAluno'];	
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'não existe aluno';
			$this->db->disconnect();
			return false;
		}
	}
	private function getUSerIdFromAluno($alunoID){
		$this->db->connect();
		$query = "select * from aluno where numero = ".$alunoID;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['nUser'];	
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'não existe utilizador';
			$this->db->disconnect();
			return false;
		}
	}
	private function getNomeAlunoWithADID($adID){
		$alunoID = $this->getAlunoWithAD($adID);
		$userID = $this->getUSerIdFromAluno($alunoID);
		$this->db->connect();
		$query = "select nome from user where numero = ".$userID;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['nome'];	
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'não existe utilizador';
			$this->db->disconnect();
			return false;
		}
	}
	private function getDisciplinasIDsFromADs($adID){
		$this->db->connect();
		$disciplinas = array();
		$query = "select * from alunoDisciplina where nAluno = ".$alunoID;
		$i = 0;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			while($row = mysqli_fetch_array($result)) {
				$disciplinasID[$i] = $row['numero'];
				$i++;
			}
			return $disciplinasID;
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'este aluno não tem disciplinas';
			$this->db->disconnect();
			return false;
		}
	}
}
?>