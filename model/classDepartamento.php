<?php
require_once ("classConexao.php");

class Departamento {
 
    private $PDO;
    public function __construct(){
        $conexao = new Conexao();
        $this->PDO = $conexao ->conectar();
    }

        public function insereDepartamento ($nomeDepart){
            $insere = $this->PDO->prepare("insert into departamento (nomeDepartamento) values (:n)");
            $insere->bindValue(":n",$nomeDepart);
            $insere->execute();
        }

        public function  validanomeDepartamento($nomeDepart){
            $valida = $this->PDO->prepare("select codDepartamento from departamento where nomeDepartamento = :depto");
            $valida->bindValue(":depto", $nomeDepart);
            $valida->execute(); 

            if($valida->rowCount()>0) {
            echo"<script>alert('Departamento já cadastrado, verifique duplicidade') </script>";
            }else {
            $this->insereDepartamento ($nomeDepart);
            echo"<script>alert('Cadastro de novo departamento efetivado com sucesso!')</script>";
            }
        }

        public function consultaDepartamento() {
            $consulta = $this->PDO->prepare("select * from departamento order by codDepartamento");
            $consulta->execute();
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function alterarDepartamento($codDepartamento, $novoNomeDepartamento) {         
            $altera = $this->PDO->prepare("update departamento set nomeDepartamento = :novoNomeDepartamento where codDepartamento = :codDepartamento");
            $altera->bindParam(':novoNomeDepartamento', $novoNomeDepartamento);
            $altera->bindParam(':codDepartamento', $codDepartamento);               
            $resultado = $altera->execute();
            return $resultado;
        }
        
        public function obterDepartamento($codDepartamento) {
            $consulta = $this->PDO->prepare("select * from departamento where codDepartamento = :codDepartamento");
            $consulta->bindParam(':codDepartamento', $codDepartamento);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        }

        public function excluirDepartamento($codDepartamento) {
            try {
                $excluir = $this->PDO->prepare("delete from departamento where codDepartamento = :codDepartamento");
                $excluir->bindParam(':codDepartamento', $codDepartamento, PDO::PARAM_INT);
                $excluir->execute();
            } catch (PDOException $e) {
                if ($e->getCode() == '23000') { 
                    echo "<script>alert('Não é possível excluir o departamento. Ele possui funcionarios associados!')</script>";
                } 
            }
        }
    }
?>