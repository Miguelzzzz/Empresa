<?php

require_once ("classConexao.php");

class Login {

    private $PDO;
    public function __construct() {
        $conexao = new Conexao();
        $this->PDO = $conexao->conectar();
    }
    
        public function insereLogin($funcional, $senha) {
            $insere = $this->PDO->prepare("insert into login (funcional, senha, acesso) values (:f, :s, :a)");
            $insere->bindValue(":n", $funcional);
            $insere->bindValue(":s", $senha);
            $insere->execute();
        }

        public function validaLogin($funcional, $senha) {
            $valida = $this->PDO->prepare("select * from login where funcional = :f");
            $valida->bindValue(":f", $funcional);
            $valida->execute();
            
            if ($valida->rowCount() != 1) {
                $this->insereLogin($funcional, $senha);
                echo "<script>alert('Nova senha cadastrada')</script>";
            } else {
                
            } 
        }
    }
?>
