<?php
require_once('model/userModel.php');
require_once('model/DisciplinaModel.php');
require_once('view/ProfessorView.php');
class ProfessorController{
	var $userModel, $disciplinaModel, $professorView;
	public function __construct(){
		$this->userModel = new UserModel();
		$this->disciplinaModel = new DisciplinaModel();
		$this->professorView = new ProfessorView();
	}
	
	public function action($username){
		$professorName = $this->userModel->getUserName($username);
		$professorID = $this->userModel->getProfessorID($username);
		if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['disciplina'])){
			$disciplina = $_GET['disciplina'];
			$evaluations = $this->disciplinaModel->getEvaluations($disciplina);
			$this->professorView->drawEvaluationButtons($disciplina, $evaluations);
		}else{
			$professorID = $this->userModel->getProfessorID($username);
			$professorName = $this->userModel->getUserName($username);
			$disciplinas = $this->disciplinaModel->getDisciplinasLecionadas($professorID);
			$this->professorView->drawDisciplineButtons($disciplinas);
			
		}
		
	}
}
?>