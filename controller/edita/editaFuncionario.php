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
    $Npath = $caminho.$nomeCodigo.".".$extensao;

    if($extensao != 'jpg' && $extensao !='png')
    die("arquivo invalido");
    
    $arquivoUpload = move_uploaded_file($arquivo["tmp_name"],$pathUpload);

    $resultado = $func->alterarFuncionario($funcional, $Ncpf, $Nnome, $Ntelefone, $Nendereco, $Npath, $NnomeCargo, $NnomeDepartamento, $created_at);  
    header("Location: ../../view/consulta/ConsultaFuncionario.php");
}
?>
