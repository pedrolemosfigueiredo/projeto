<?php
define('SMARTY_DIR','view/smarty/libs/');
define('SMARTY_TPL','view/templates/');
define('SMARTY_CPL','view/templates/compile/');
require_once(SMARTY_DIR.'Smarty.class.php');
class AuthenticationView{
	$smarty = new Smarty();
	public function __construct(){
		$this->smarty->template_dir = './view/templates/';
		$this->smarty->compile_dir = './view/templates/compile/';
	}
	public function drawAuthenticationPage($situation){
		$this->smarty->assign('authenticationString', $situation);
	}
}
?>