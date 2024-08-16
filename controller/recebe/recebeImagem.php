<?php
/* Comando para instanciar a classe conexão
   e passar os dados do parâmetro do banco */
require_once '../../model/classFuncionario.php';
$func = new Funcionario();

// Verificar o arquivo para upload
if (isset($_FILES['img-funcionario'])) {
    // Receber o arquivo na variável 
    $arquivo = $_FILES['img-funcionario'];

    // Tratar erro de envio
    if ($arquivo['error']) {
        die("Falha ao carregar");
    }

    // Delimitar tamanho do arquivo
    if ($arquivo['size'] > 10485760) { // 10MB em bytes
        die("Arquivo excedeu o limite, máximo 10MB");
    }

    // Ver o conteúdo do arquivo (para depuração)
    echo "<pre>";
    print_r($arquivo);
    echo "</pre>";

    // Converter para variáveis as partes do arquivo
    $pasta = "img/";
    $nomeCodigo = uniqid(); // Gera um identificador único
    $nomeArq = basename($arquivo['name']); // Extrai o nome do arquivo
    $extensao = strtolower(pathinfo($nomeArq, PATHINFO_EXTENSION)); // Obtém a extensão e transforma em minúsculo

    // Criar a variável $imagem
    $imagem = $pasta . $nomeCodigo . "." . $extensao;

    // Verificar a extensão
    if ($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png') {
        die("Arquivo inválido. Apenas JPG e PNG são permitidos.");
    }

    // Mover para a pasta do projeto
    if (move_uploaded_file($arquivo["tmp_name"], $imagem)) {
        // Enviar os dados para a função insere
        $func->insereImagem($imagem);
        echo "<script>alert('Arquivo enviado com sucesso');</script>";
    } else {
        die("Falha ao mover o arquivo");
    }
} else {
    die("Nenhum arquivo enviado");
}
?>
