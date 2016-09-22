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
		//$disciplinasID = $this->getDisciplinasIDsFromADs($alunoID);
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
			echo 'este aluno não tem disciplinas';
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
	public function getNotasWithAlunoAndDisciplina($alunoID, $disciplinaID){
		$notas = array();
		$ad = $this->getADWithAlunoAndDisciplina($alunoID, $disciplinaID);
		$this->db->connect();
		$query = "select * from nota where nAlunoDisciplina = ".$ad;
		$i = 0;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			while($row = mysqli_fetch_array($result)) {
				$nomeAvaliacao = $this->getNomeAvaliacaoWithID($row['nAvaliacao']);
				$tipoAvaliacao = $this->gettipoAvaliacaoWithID($row['nAvaliacao']);
				$valorAvaliacao = $this->getValorAvaliacaoWithID($row['nAvaliacao']);
				$notaMinima = $this->getNotaMinima($row['nAvaliacao']);
				if(is_null($row['nota'])){$row['nota'] = "esta avaliação ainda não foi realizada";}
				$notas[$i] = array($row['numero'], $row['nota'], $nomeAvaliacao, $tipoAvaliacao, $valorAvaliacao, $notaMinima);
				$i++;
			}
			return $notas;
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'Esta aluno não tem avaliações nesta disciplina ';
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
	private function getDisciplinaWithAD($alunoDisciplina){
		$this->db->connect();
		$query = "select * from alunodisciplina where numero = ".$alunoDisciplina;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['nDisciplina'];	
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
		$query = "select * from alunoDisciplina where numero = ".$adID;
		$i = 0;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			while($row = mysqli_fetch_array($result)) {
				$row = $disciplinasID[$i] = $row['nDisciplina'];
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
	private function getADWithAlunoAndDisciplina($alunoID, $disciplinaID){
		$this->db->connect();
		$disciplinas = array();
		$query = "select * from alunodisciplina where nAluno = ".$alunoID." and nDisciplina = ".$disciplinaID;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['numero'];
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'este aluno não tem disciplinas';
			$this->db->disconnect();
			return false;
		}
	}
	private function getNomeAvaliacaoWithID($avaliacaoID){
		$this->db->connect();
		$query = "select * from avaliacao where numero = ".$avaliacaoID;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['nome'];
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'erro a aceder ao nome das avaliações';
			$this->db->disconnect();
			return false;
		}
	}
	private function gettipoAvaliacaoWithID($avaliacaoID){
		$this->db->connect();
		$query = "select * from avaliacao where numero = ".$avaliacaoID;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['tipo'];
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'erro a aceder ao nome das avaliações';
			$this->db->disconnect();
			return false;
		}
	}
	private function getValorAvaliacaoWithID($avaliacaoID){
		$this->db->connect();
		$query = "select * from avaliacao where numero = ".$avaliacaoID;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['valor'];
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'erro a aceder ao nome das avaliações';
			$this->db->disconnect();
			return false;
		}
	}
	private function getNotaMinima($avaliacaoID){
		$this->db->connect();
		$query = "select * from avaliacao where numero = ".$avaliacaoID;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['notaMinima'];
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'erro a aceder ao nome das avaliações';
			$this->db->disconnect();
			return false;
		}
	}
	public function changeGrades($notas){
		$sizeNotas = count($notas);
		$result;
		for($i=0; $i<$sizeNotas; $i++){
			$this->db->connect();
			$query = "update nota set nota = ".$notas[$i][1]." where numero = ".$notas[$i][0];
			$result = mysqli_query($this->db->getConnection(), $query);
			
			
		}
		if($result){return true;}
		else{return false;}
	}
	public function getAlunoDisciplinasFromALuno($alunoID){
		$this->db->connect();
		$i = 0;
		$alunoDisciplinas = array();
		$query = "select * from alunoDisciplina where nAluno = ".$alunoID;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			while($row = mysqli_fetch_array($result)) {
				$alunoDisciplinas[$i] = array($row['numero'],$row['nDisciplina'], $row['notaFinal']);
				$i++;
			}
			return $alunoDisciplinas;
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'este aluno não tem disciplinas';
			$this->db->disconnect();
			return false;
		}
	}
	public function getECTS($disciplinaID){
		$this->db->connect();
		$query = "select * from disciplina where numero = ".$disciplinaID;
		$result = mysqli_query($this->db->getConnection(), $query);
		if ($result) {
			$this->db->disconnect();
			$row = mysqli_fetch_array($result);
			return $row['ECTS'];
		} else {
			//printf("Errormessage: %s\n", mysqli_error($this->db->getConnection()));
			echo 'erro a aceder ao nome das avaliações';
			$this->db->disconnect();
			return false;
		}
	}
	public function getnotaECTS($alunoID){
		$alunoDisciplinas = $this->getAlunoDisciplinasFromALuno($alunoID);
		$i = 0;
		$notaECTSMultiplied;
		$nAlunoDisciplinas = count($alunoDisciplinas);
		for($i=0; $i<$nAlunoDisciplinas; $i++){
			if(!is_null($alunoDisciplinas[$i][2])){
				$ects = $this->getECTS($alunoDisciplinas[$i][0]);
			}
		}
	}
	public function setNotaFinal($alunoDisciplinaID){
		$x = 0;
		$alunoID =$this->getAlunoWithAD($alunoDisciplinaID);
		$disciplinaID = $this->getDisciplinaWithAD($alunoDisciplinaID);
		$notas = $this->getNotasWithAlunoAndDisciplina($alunoID, $disciplinaID);
		$nNotas = count($notas);
		$differentEvaluations = array();
		$notasMaisAltas = array();
		for($i=0; $i<$nNotas; $i++){
			if($notas[$i][3] === "normal"){
				array_push($differentEvaluations, $notas[$i][2]);
				$notasMaisAltas[$x] = array($notas[$i][2], $notas[$i][1], $notas[$i][4], $notas[$i][5]);
				$x++;
			}
		}
		
		$nNotasMaisAltas = count($notasMaisAltas);
		for($i=0; $i<$nNotas; $i++){
			for($j=0; $j<$nNotasMaisAltas;$j++){
				if($notas[$i][2] == $notasMaisAltas[$j][0]){
					if($notas[$i][1] > $notasMaisAltas[$j][1]){
						$notasMaisAltas[$j][1] = $notas[$i][1];
					}
				}
			}
		}
		$notaSemiFinal = 0;
		$fracaoNota;
		for($i=0; $i<$nNotasMaisAltas; $i++){
			if(is_null($notasMaisAltas[$i][1])){return 0;}
			if($notasMaisAltas[$i][1]<$notasMaisAltas[$i][3]){
				return 0;
			}else{
				$fracaoNota = $notasMaisAltas[$i][2]/100;
				$notaSemiFinal = $notaSemiFinal + ($notasMaisAltas[$i][1] * $fracaoNota);
			}
		}
		$notaFinal = round($notaSemiFinal);
		if($notaFinal >= 10){
			$this->db->connect();
			$query = "update alunodisciplina set notaFinal = ".$notaFinal." where numero = ".$alunoDisciplinaID;
			$result = mysqli_query($this->db->getConnection(), $query);
			if($result){return 1;}
			else{return 2;}
		}
	}
}
?>