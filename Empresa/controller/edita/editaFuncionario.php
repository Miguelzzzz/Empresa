<?php

include_once "../../model/classFuncionario.php";

$func = new Funcionario();

    if(isset($_GET['altera'])){
        $funcional = $_GET['altera'];
        $_SESSION['funcional'] = $funcional;

        $dadosFuncionario = $func->obterFuncionario($funcional);
    }

    if(isset($_POST['txtNNome'])){
        $Ncpf = $_POST['txtNCPF'];
        $Nnome = $_POST['txtNNome'];
        $Ntelefone = $_POST['txtNTelefone'];
        $Nendereco = $_POST['txtNEndereco'];
        $NnomeCargo = $_POST['txtNCargo'];
        $NnomeDepartamento = $_POST['txtNDepartamento'];
        $Nacesso = $_POST['txtAcesso'];
        $created_at = addslashes($_POST['datetime']);

        $Npath = addslashes($_POST['img-funcionario']);

        $resultado = $func->alterarFuncionario($funcional, $Ncpf, $Nnome, $Ntelefone, $Nendereco, $Npath, $NnomeCargo, $NnomeDepartamento, $Nacesso, $created_at);  
        
        header("Location: ../../view/consulta/ConsultaFuncionario.php");
    }
?>
