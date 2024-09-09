<?php

require_once("classConexao.php");

class Login
{

    private $PDO;
    public function __construct()
    {
        $conexao = new Conexao();
        $this->PDO = $conexao->conectar();
    }

    public function insereLogin($funcional, $senha, $acesso)
    {
        $hash_senha = password_hash($senha, PASSWORD_DEFAULT);
        $insere = $this->PDO->prepare("insert into login (funcional, senha, acesso) values (:f, :s, :a)");
        $insere->bindValue(":f", $funcional);
        $insere->bindValue(":s", $hash_senha);
        $insere->bindValue(":a", $acesso);
        $insere->execute();
    }

    public function validaLogin($funcional, $senha, $acesso)
    {
        $valida = $this->PDO->prepare("select * from login where funcional = :f");
        $valida->bindValue(":f", $funcional);
        $valida->execute();

        if ($valida->rowCount() == 0) {
            $this->insereLogin($funcional, $senha, $acesso);
            echo "<script>alert('Nova senha cadastrada')</script>";
        } else {
            $usuario = $valida->fetch(PDO::FETCH_ASSOC);

            if(!password_verify($senha, $usuario['senha'])){
                echo "<script>alert('Senha incorreta')</script>";
            }
            else {
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $_SESSION['funcional'] = $usuario['funcional'];
                echo "<script>alert('Sessão iniciada')</script>";

                header("location: ../usuario/perfil.php");
            }
        }
    }

    public function validaFuncionario($funcional, $senha)
    {
        $valida = $this->PDO->prepare("select funcional, acesso from funcionario where funcional = :f");
        $valida->bindValue(":f", $funcional);
        $valida->execute();

        if ($valida->rowCount() == 0) {
            echo "<script>alert('Funcionário inexistente')</script>";
        } else {
            $usuario = $valida->fetch(PDO::FETCH_ASSOC);
            $acesso = $usuario['acesso'];
            $this->validaLogin($funcional, $senha, $acesso);
        }
    }
}
