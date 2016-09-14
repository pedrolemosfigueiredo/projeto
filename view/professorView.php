<?php
define('SMARTY_DIR','view/smarty/libs/');
define('SMARTY_TPL','view/templates/');
define('SMARTY_CPL','view/templates/compile/');
require_once(SMARTY_DIR.'Smarty.class.php');
class ProfessorView{
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
		$this->smarty->display('professorHomePage.tpl');
	}
	
	public function drawEvaluationButtons($disciplina, $evaluations){
		$this->smarty->assign('disciplina', $disciplina);
		$this->smarty->assign('evaluations', $evaluations);
		$numberOfEvaluations = count($evaluations);
		$this->smarty->assign('nEvaluations', $numberOfEvaluations);
		$this->smarty->display('professorDisciplina.tpl');
	}
	public function drawEvaluationForm($disciplina, $evaluation, $notas){
		$this->smarty->assign('disciplina', $disciplina);
		$this->smarty->assign('evaluation', $evaluation);
		$numberOfNotas = count($notas);
		$this->smarty->assign('nNotas', $numberOfNotas);
		$this->smarty->assign('notas', $notas);
		$this->smarty->display('professorEvaluation.tpl');
	}
	public function drawEvaluationChanges($disciplina, $evaluation, $notas){
		
	}
	
}
?>