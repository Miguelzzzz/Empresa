<?php

require_once ("classConexao.php");

class Cargo {

    private $PDO;
    public function __construct() {
        $conexao = new Conexao();
        $this->PDO = $conexao->conectar();
    }
    
        public function insereCargo($nomeCargo, $salario, $created_at) {
            $insere = $this->PDO->prepare("insert into cargo (nomeCargo, salario, created_at) values (:n, :s, :at)");
            $insere->bindValue(":n", $nomeCargo);
            $insere->bindValue(":s", $salario);
            $insere->bindValue(":at", $created_at);
            $insere->execute();
        }

        public function validanomeCargo($nomeCargo, $salario, $created_at) {
            $valida = $this->PDO->prepare("select codCargo from cargo where nomeCargo = :carg");
            $valida->bindValue(":carg", $nomeCargo);
            $valida->execute();
            
            if ($valida->rowCount() > 0) {
                echo "<script>alert('Cargo já cadastrado, verifique duplicidade')</script>";
            } else {
                $this->insereCargo($nomeCargo, $salario, $created_at);
                echo "<script>alert('Cadastro de novo cargo efetivado com sucesso!')</script>";
            } 
        }

        public function consultaCargos() {
            $consulta = $this->PDO->prepare("select * from cargo order by codCargo");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }

        public function alterarCargo($codCargo, $novoNomeCargo, $novoSalario, $created_at) {
            $altera = $this->PDO->prepare("update cargo set nomeCargo = :novoNomeCargo, created_at = :novaDataHora, salario = :novoSalario where codCargo = :codCargo");
            $altera->bindParam(':novoNomeCargo', $novoNomeCargo);
            $altera->bindParam(':novoSalario', $novoSalario);
            $altera->bindParam(':novaDataHora', $created_at);
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
