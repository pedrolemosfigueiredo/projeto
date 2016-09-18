<?php
define('SMARTY_DIR','view/smarty/libs/');
define('SMARTY_TPL','view/templates/');
define('SMARTY_CPL','view/templates/compile/');
require_once(SMARTY_DIR.'Smarty.class.php');
class AlunoView{
	var $smarty;
	public function __construct(){
		$this->smarty = new Smarty();
		$this->smarty->template_dir = './view/templates/';
		$this->smarty->compile_dir = './view/templates/compile/';
	}
	public function drawDisciplineButtons($disciplinas){
		$this->smarty->assign('disciplinas', $disciplinas);
		$numberOfDisciplinas = count($disciplinas);
		$this->smarty->assign('nDisciplinas', $numberOfDisciplinas);
		$this->smarty->display('alunoHomePage.tpl');
	}
	public function drawNotas($notas){
		$this->smarty->assign('notas', $notas);
		$numberOfNotas = count($notas);
		$this->smarty->assign('nNotas', $numberOfNotas);
		$this->smarty->display('alunoNotas.tpl');
	}
	public function drawMedia($alunoName, $notaMedia){
		$this->smarty->assign('name', $alunoName);
		$this->smarty->assign('media', $notaMedia);
		$this->smarty->display('alunoMedia.tpl');
	}
}
?>