<?php 
require_once '../../model/classFuncionario.php';

$funcionario = new Funcionario();
$funcionarios = $funcionario->consultaFuncionario();

    if(isset($_GET['imprime'])){
        $funcional = $_GET['imprime'];
        $_SESSION['funcional'] = $funcional;

        $dadosFuncionario = $funcionario->obterFuncionario($funcional);
    }

    if(isset($_POST['funcional'])){

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

        $resultado = $funcionario->alterarImagem($funcional, $Npath);

    if ($funcionarios === false) {
        echo "Erro ao criar relatorio.";
        exit;
    }
}
?>