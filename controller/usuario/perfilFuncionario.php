<?php

include_once "../../model/classFuncionario.php";


session_start();
$funcional = isset($_SESSION['funcional']) ? $_SESSION['funcional'] : null;

if ($funcional) {
    $func = new Funcionario();
    $funcionarios = $func->obterFuncionario($funcional);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $funcional = $_POST['input-funcional'];
    $telefone = $_POST['txtNTelefone'];
    $endereco = $_POST['txtNEndereco'];

    if (isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
        $arquivo = $_FILES['img'];

        if ($arquivo['size'] > 10485760) {
            die("Arquivo excedeu o limite de 10MB");
        }

        $pasta = "../../view/img/";
        $nomeArq = $arquivo['name'];
        $nomeCodigo = uniqid();
        $extensao = strtolower(pathinfo($nomeArq, PATHINFO_EXTENSION));

        if ($extensao != 'jpg' && $extensao != 'png') {
            die("Arquivo inválido. Aceito apenas JPG e PNG.");
        }

        $pathUpload = $pasta . $nomeCodigo . "." . $extensao;
        $Npath = "view/img/" . $nomeCodigo . "." . $extensao;

        move_uploaded_file($arquivo["tmp_name"], $pathUpload);
    } else {
        $Npath = $funcionarios['img'];
    }

    $resultado = $func->alterarPerfilFuncionario($funcional, $telefone, $endereco, $Npath);

    if ($resultado) {
        echo "<script>alert('Dados atualizados com sucesso!');
       window.location.href = '../../view/usuario/perfil.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar os dados')</script>";
    }
}
