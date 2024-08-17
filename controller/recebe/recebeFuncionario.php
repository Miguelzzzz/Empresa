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
      $created_at = addslashes($_POST['datetime']);

      $arquivo = $_FILES['img-funcionario'];

      if($arquivo['error'])
      die("falha ao carregar");

      if($arquivo['size']>10485760)
      die("arquivo excedeu o limite, maximo 10MB");

      $pasta = "../../view/img/";
      $caminho = "view/img/";
      $nomeArq = $arquivo['name'];
      $nomeCodigo = uniqid();
      $extensao = strtolower(pathinfo($nomeArq,PATHINFO_EXTENSION));

      $pathUpload = $pasta.$nomeCodigo.".".$extensao;
      $path = $caminho.$nomeCodigo.".".$extensao;

      if($extensao != 'jpg' && $extensao !='png')
      die("arquivo invalido");
         
      $arquivoUpload = move_uploaded_file($arquivo["tmp_name"],$pathUpload);

      $func->validaFuncionario($cpf, $nome, $telefone, $endereco, $path, $codCargo, $codDepartamento, $created_at);
   } 
?>