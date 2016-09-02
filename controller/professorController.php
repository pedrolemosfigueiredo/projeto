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
		$professorName = $this->UserModel->getUserName($username);
		$professorID = $this->userModel->getProfessorID($username);
		if($_SERVER['REQUEST_METHOD']=='GET'){
			
		}else{
			$professorID = $this->userModel->getProfessorID($username);
			$professorName = $this->UserModel->getUserName($username);
			$disciplinas = $this->disciplinaModel->getDisciplinasLecionadas($professorID);
			
		}
		
	}
}
?>