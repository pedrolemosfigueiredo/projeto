<?php
session_start();
require_once('model/userModel.php');
require_once('controller/alunoController.php');
require_once('controller/professorController.php');
require_once('view/authenticationView.php');
class AuthenticationController{
	$var $userModel, $alunoController, $professorController, $authenticationView;
	public function __construct(){
		$this->$userModel = new UserModel();
		$this->alunoController = new AlunoController();
		$this->professorController = new ProfessorController();
		$this->authenticationView = new AuthenticationView();
	}
	public function action(){
		if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin'] == true){
			if($_SESSION['type'] == 'aluno'){
				$this->alunoController->action();
			}else if($_SESSION['type'] = 'professor';){
				$this->professorController->action();
			}
		}else if(!isset($_SESSION['situation'])){
			$this->authenticationView->drawAuthenticationPage('normal');
		}else{
			$this->authenticationView->drawAuthenticationPage($_SESSION['situation']);
		}
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if(isset($_POST['login'])){
				$username = $_POST['username'];
				$password = $_Post['password'];
				$authentication = $this->userModel->authentication($username,$password);
				if($authentication == 'correct'){
					$_SESSION['loggedin'] = true;
					$_SESSION['user'] = $userName;
					$userType = $this->userType($username);
					if($userType == 'aluno'){
						$_SESSION['type'] = 'aluno';
						$this->alunoController->action();
					}else if($userType == 'professor'){
						$_SESSION['type'] = 'professor';
						$this->professorController->action();
					}
				}else if($authentication == 'password fail'){
					$_SESSION['situation'] = 'password fail';
				}else{
					$_SESSION['situation'] = 'invalid username';
				}
			}
		}
	}
	
	private function userType($username){
		$isALuno = $this->userModel->checkIfIsAluno($username);
		if($isALuno){return 'aluno';}
		$isProfessor = $this->userModel->checkIfIsProfessor($username);
		if($isProfessor){return 'professor';}
		else{return 'error';}
	}
	
	public function authenticationFailed(){
		
	}
}
?>