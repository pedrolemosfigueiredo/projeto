<?php
	require_once('model/userModel.php');
	class AuthenticationController{
		$var $userModel;
		public function __construct(){
			$this->$userModel = new UserModel();
		}
		public function action(){
			if($_SERVER['REQUEST_METHOD']=='POST'){
				if(isset($_POST['login'])){
					$username = $_POST['username'];
					$password = $_Post['password'];
					$authentication = $this->userModel->authentication($username,$password);
					if($authentication == 'correct'){
						$_SESSION['user'] = $userName;
						
					}else if($authentication == 'password fail'){
						
					}else{
						echo 'invalid username';
					}
				}
			}
		}
		
		public function authenticationSuccess(){
			
		}
		
		public function authenticationFailed(){
			
		}
	}
?>