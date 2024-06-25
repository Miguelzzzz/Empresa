<?php
require_once "classConexao.php";

class Cargo {

    private $PDO;
    public function __construct() {
        $conexao = new Conexao();
        $this->PDO = $conexao->conectar();
    }
    
        public function insereCargo($nomeCargo) {
            $insere = $this->PDO->prepare("insert into cargo (nomeCargo) values (:n)");
            $insere->bindValue(":n", $nomeCargo);
            $insere->execute();
        }

        public function validanomeCargo($nomeCargo) {
            $valida = $this->PDO->prepare("select codCargo from cargo where nomeCargo = :carg");
            $valida->bindValue(":carg", $nomeCargo);
            $valida->execute();
            
            if ($valida->rowCount() > 0) {
                echo "<script>alert('Cargo já cadastrado, verifique duplicidade')</script>";
            } else {
                $this->insereCargo($nomeCargo);
                echo "<script>alert('Cadastro de novo cargo efetivado com sucesso!')</script>";
            } 
        }

        public function consultaCargos() {
            $consulta = $this->PDO->prepare("select * from cargo order by codCargo");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        public function alterarCargo($codCargo, $novoNomeCargo) {
            $altera = $this->PDO->prepare("update cargo set nomeCargo = :novoNomeCargo where codCargo = :codCargo");
            $altera->bindParam(':novoNomeCargo', $novoNomeCargo);
            $altera->bindParam(':codCargo', $codCargo);         
            $resultado = $altera->execute();  
            return $resultado;
        }
        
        public function obterCargo($codCargo) {
            $consulta = $this->PDO->prepare("select * from cargo where codCargo = :codCargo");
            $consulta->bindParam(':codCargo', $codCargo);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        }

        public function excluirCargo($codCargo) {
            try {
                $excluir = $this->PDO->prepare("delete from cargo where codCargo = :codCargo");
                $excluir->bindParam(':codCargo', $codCargo, PDO::PARAM_INT);
                $excluir->execute();
            } catch (PDOException $e) {
                if ($e->getCode() == '23000') { 
                    echo "<script>alert('Não é possível excluir o cargo. Ele possui funcionarios associados!')</script>";
                } 
            }
        }
    }
?>
