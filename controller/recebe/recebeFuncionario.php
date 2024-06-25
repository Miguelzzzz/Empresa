<?php
require_once '../../model/classFuncionario.php';
   
if(isset($_POST['txtCPF'])){
        
$func = new Funcionario();

$cpf = addslashes($_POST ['txtCPF']);
$nome = addslashes($_POST ['txtNome']);
$telefone = addslashes($_POST ['txtTelefone']);
$endereco = addslashes($_POST ['txtEndereco']);
$codCargo = addslashes($_POST ['txtCargo']);
$codDepartamento = addslashes($_POST ['txtDepartamento']);

$func->validaFuncionario($cpf, $nome, $telefone, $endereco, $codCargo, $codDepartamento);
} 
?>