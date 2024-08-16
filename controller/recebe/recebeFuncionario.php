<?php
require_once '../../model/classFuncionario.php';
   
if(isset($_POST['txtCPF'])){
        
$func = new Funcionario();

$cpf = addslashes($_POST ['txtCPF']);
$nome = addslashes($_POST ['txtNome']);
$telefone = addslashes($_POST ['txtTelefone']);
$endereco = addslashes($_POST ['txtEndereco']);
$imagem = addslashes($_POST ['img-funcionario']);
$codCargo = addslashes($_POST ['txtCargo']);
$codDepartamento = addslashes($_POST ['txtDepartamento']);
$created_at = addslashes($_POST['datetime']);

$func->validaFuncionario($cpf, $nome, $telefone, $endereco, $imagem, $codCargo, $codDepartamento, $created_at);
} 
?>