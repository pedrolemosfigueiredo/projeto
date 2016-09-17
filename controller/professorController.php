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
		}else if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['evaluation'])){
			$evaluation = $_GET['evaluation'];
			$notas = $this->disciplinaModel->getNotas($evaluation);
			$disciplina = $this->disciplinaModel->getDisciplinaFromEvaluation($evaluation);
			$this->professorView->drawEvaluationForm($disciplina, $evaluation, $notas);
		}
		else if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['changeGrades'])){
			$i = 0;
			$notasNovas = array();
			foreach($_POST['nota'] as $gradeID=>$grade){
				$notasNovas[$i] = array($gradeID, $grade);
				$i++;
			}
			$evaluation = $_POST['evaluation'];
			$disciplina = $this->disciplinaModel->getDisciplinaFromEvaluation($evaluation);
			$save = $this->disciplinaModel->changeGrades($notasNovas);
			$notas = $this->disciplinaModel->getNotas($evaluation);
			$this->professorView->drawEvaluationForm($disciplina, $evaluation, $notas);
		}
		else{
			/* $professorID = $this->userModel->getProfessorID($username);
			$professorName = $this->userModel->getUserName($username); */
			$disciplinas = $this->disciplinaModel->getDisciplinasLecionadas($professorID);
			$this->professorView->drawDisciplineButtons($disciplinas);
			
		}
		
	}
}
?>