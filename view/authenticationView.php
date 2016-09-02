<?php
if(!defined('SMARTY_DIR'))define('SMARTY_DIR','view/smarty/libs/');
if(!defined('SMARTY_TPL'))define('SMARTY_TPL','view/templates/');
if(!defined('SMARTY_CPL'))define('SMARTY_CPL','view/templates/compile/');
require_once(SMARTY_DIR.'Smarty.class.php');
class AuthenticationView{
	var $smarty;
	public function __construct(){
		$this->smarty = new Smarty();
		$this->smarty->template_dir = './view/templates/';
		$this->smarty->compile_dir = './view/templates/compile/';
	}
	public function drawAuthenticationPage($situation){
		$this->smarty->assign('authenticationString', $situation);
		$this->smarty->display('authentication.tpl');
	}
}
?>