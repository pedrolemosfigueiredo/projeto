<?php
require_once('model/userModel.php');
require_once('model/DisciplinaModel.php');
require_once('view/AlunoView.php');
class AlunoController{
	var $userModel, $disciplinaModel, $alunoView;
	public function __construct(){
		$this->userModel = new UserModel();
		$this->disciplinaModel = new DisciplinaModel();
		$this->alunoView = new AlunoView();
	}
	public function action($username){
		$alunoName = $this->userModel->getUserName($username);
		$alunoID = $this->userModel->getAlunoID($username);
		if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['disciplina'])){
			$disciplina = $_GET['disciplina'];
			$notas = $this->disciplinaModel->getNotasWithAlunoAndDisciplina($alunoID, $disciplina);
			$this->alunoView->drawNotas($notas);
		}else{
			$disciplinas = $this->disciplinaModel->getDisciplinasAluno($alunoID);
			$this->alunoView->drawDisciplineButtons($disciplinas);
		}
	}
	public function media($username){
		$alunoName = $this->userModel->getUserName($username);
		$notaMedia = $this->getnotaMedia($username);
		$this->alunoView->drawMedia($username, $notaMedia);
	}
	public function getnotaMedia($username){
		$alunoID = $this->userModel->getAlunoID($username);
		$alunoDisciplinas = $this->disciplinaModel->getAlunoDisciplinasFromALuno($alunoID);
		$i = 0;
		$notasECTSMultiplied = 0;
		$ectsTotal = 0;
		$nAlunoDisciplinas = count($alunoDisciplinas);
		echo $nAlunoDisciplinas;
		if($nAlunoDisciplinas == 0){return 0;}
		for($i=0; $i<$nAlunoDisciplinas; $i++){
			$this->disciplinaModel->setNotaFinal($alunoDisciplinas[$i][0]);
		}
		$alunoDisciplinas = $this->disciplinaModel->getAlunoDisciplinasFromALuno($alunoID);
		for($i=0; $i<$nAlunoDisciplinas; $i++){
			if(!is_null($alunoDisciplinas[$i][2])){
				$ects = $this->disciplinaModel->getECTS($alunoDisciplinas[$i][0]);
				$notaECTSMultiplied = $alunoDisciplinas[$i][2] * $ects;
				$notasECTSMultiplied = $notasECTSMultiplied + $notaECTSMultiplied;
				$ectsTotal = $ectsTotal + $ects;
			}
		}
		$media = $notasECTSMultiplied / $ectsTotal;
		$media = round($media, 2);
		return $media;
	}
}
?>