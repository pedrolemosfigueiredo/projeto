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
			
		}else{
			$disciplinas = $this->disciplinaModel->getDisciplinasAluno($alunoID);
			$this->alunoView->drawDisciplineButtons($disciplinas);
		}
	}
}
?>