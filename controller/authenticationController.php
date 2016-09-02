<?php
require_once('model/userModel.php');
require_once('controller/alunoController.php');
require_once('controller/professorController.php');
require_once('view/authenticationView.php');
class AuthenticationController{
	var $userModel, $alunoController, $professorController, $authenticationView;
	public function __construct(){
		$this->userModel = new UserModel();
		$this->alunoController = new AlunoController();
		$this->professorController = new ProfessorController();
		$this->authenticationView = new AuthenticationView();
	}
	public function action(){
		//$_SESSION['loggedin']= false;
		if(isset($_SESSION['loggedin'])&& $_SESSION['loggedin'] == true){
			if($_SESSION['type'] == 'aluno'){
				$this->alunoController->action($_SESSION["user"]);
			}else if($_SESSION['type'] == 'professor'){
				$this->professorController->action($_SESSION["user"]);
			}
		}else if(!isset($_SESSION['situation'])||$_SESSION['situation'] == 'normal'){
			$this->authenticationView->drawAuthenticationPage('normal');
		}else{
			$situation = $_SESSION['situation'];
			$_SESSION['situation'] = 'normal';
			$this->authenticationView->drawAuthenticationPage($situation);
		}
		if($_SERVER['REQUEST_METHOD']=='POST'){
			if(isset($_POST['login'])){
				$username = $_POST['username'];
				if(is_numeric($username)){
					$username = (int)$username;
				}
				$password = $_POST['password'];
				$authentication = $this->userModel->authentication($username,$password);
				if($authentication == 'correct'){
					$_SESSION['loggedin'] = true;
					$_SESSION['user'] = $username;
					$userType = $this->getUserType($username);
					$_SESSION['type'] = $userType;
					if($userType == 'aluno'){
						$this->alunoController->action($username);
					}else if($userType == 'professor'){
						echo "hello";
						$this->professorController->action($username);
					}
				}else if($authentication == 'password fail'){
					$_SESSION['situation'] = 'password fail';
					
				}else{
					$_SESSION['situation'] = 'invalid username';
				}
				//header('Location: '.$_SERVER['REQUEST_URI']);
			}
		}
	}
	
	private function getUserType($username){
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