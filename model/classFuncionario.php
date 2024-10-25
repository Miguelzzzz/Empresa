<?php

require_once ("classConexao.php");

class Funcionario {
    
    private $PDO;
    public function __construct(){
        $conexao = new Conexao();
        $this->PDO = $conexao->conectar();
    }     
        public function insereFuncionario($cpf, $nome, $telefone, $endereco, $imagem, $codCargo, $codDepartamento, $acesso, $created_at){
            $insere = $this->PDO->prepare("insert into funcionario (cpf, nome, telefone, endereco, img, codCargo, codDepartamento, acesso, created_at) value (:c, :n, :t, :e, :i, :g, :d, :a, :at)");
            $insere->bindValue(":c", $cpf);
            $insere->bindValue(":n", $nome);
            $insere->bindValue(":t", $telefone);
            $insere->bindValue(":e", $endereco);
            $insere->bindValue(":i", $imagem);
            $insere->bindValue(":g", $codCargo);
            $insere->bindValue(":d", $codDepartamento); 
            $insere->bindValue(":a", $acesso); 
            $insere->bindValue(":at", $created_at);
            $insere->execute();
        }

        public function  validaFuncionario($cpf, $nome, $telefone, $endereco, $imagem, $codCargo, $codDepartamento, $acesso, $created_at){
            $valida = $this->PDO->prepare("select cpf from funcionario where cpf = :c");
            $valida->bindValue(":c", $cpf);
            $valida->execute();
        
            if($valida->rowCount()>0) {
                echo"<script>alert('Funcionario já cadastrado, verifique duplicidade') </script>";
            }else {
                $this->insereFuncionario($cpf, $nome, $telefone, $endereco, $imagem, $codCargo, $codDepartamento, $acesso, $created_at);
                echo"<script>alert('Cadastro de novo Funcionario efetivado com sucesso!')</script>";
            }
        }

        public function consultaCargo(){
            $retorna = array();
            $le = $this->PDO->query("select codCargo, nomeCargo FROM cargo order by nomeCargo");
            $retorna = $le->fetchAll(PDO::FETCH_ASSOC);
            return $retorna;
        }

        public function consultaDepartamento(){
            $retorna = array();
            $le = $this->PDO->query("select codDepartamento, nomeDepartamento from departamento order by nomeDepartamento");
            $retorna = $le->fetchAll(PDO::FETCH_ASSOC);
            return $retorna;
        }

        public function consultaFuncionario(){
            $retorna = $this->PDO->prepare("select funcionario.funcional, funcionario.nome, funcionario.cpf, funcionario.endereco, funcionario.telefone, funcionario.img, funcionario.created_at, funcionario.acesso,  departamento.nomeDepartamento, cargo.nomeCargo from departamento inner join funcionario on departamento.codDepartamento = funcionario.codDepartamento inner join cargo on cargo.codCargo = funcionario.codCargo");
            $retorna->execute();
            $result = $retorna->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function alterarFuncionario($funcional, $Ncpf, $Nnome, $Ntelefone, $Nendereco, $Npath, $NnomeCargo, $NnomeDepartamento, $Nacesso, $created_at){
            $altera = $this->PDO->prepare("update funcionario set cpf = :c, nome = :n, telefone = :t, endereco = :e, img = :i, codCargo = :g, codDepartamento = :d, acesso = :ac, created_at = :at where funcional = :f");
            var_dump($altera);
            $altera->bindParam(':f', $funcional);
            $altera->bindParam(':c', $Ncpf);
            $altera->bindParam(':n', $Nnome);
            $altera->bindParam(':t', $Ntelefone);
            $altera->bindParam(':e', $Nendereco);
            $altera->bindParam(':i', $Npath);
            $altera->bindParam(':g', $NnomeCargo);
            $altera->bindParam(':d', $NnomeDepartamento);
            $altera->bindParam(':ac', $Nacesso);
            $altera->bindParam(':at', $created_at);
            $resultado = $altera->execute();
            return $resultado;
        }

        public function alterarPerfilFuncionario($funcional, $telefone, $endereco, $Npath) {
            $altera = $this->PDO->prepare("update funcionario set telefone = :t, endereco = :e, img = :i where funcional = :f");
            var_dump($altera);
            $altera->bindParam(':f', $funcional);
            $altera->bindParam(':t', $telefone);
            $altera->bindParam(':e', $endereco);
            $altera->bindParam(':i', $Npath);
            $resultado = $altera->execute();
            return $resultado;
        }
        
        public function alterarFoto($funcional, $Npath, $created_at) {
            $altera = $this->PDO->prepare("update funcionario set img = :img, created_at = :at where funcional = :f");
            var_dump($altera);
            $altera->bindParam(':f', $funcional);
            $altera->bindParam(':img', $Npath);
            $altera->bindParam(':at', $created_at);
            $resultado = $altera->execute();
            var_dump($resultado);
            return $resultado;
        }

        public function obterFuncionario($funcional) {
            $consulta = $this->PDO->prepare( "select funcionario.funcional, funcionario.nome, funcionario.cpf, funcionario.endereco, funcionario.telefone, funcionario.img, funcionario.created_at, funcionario.acesso, departamento.nomeDepartamento, cargo.nomeCargo from departamento inner join funcionario on departamento.codDepartamento = funcionario.codDepartamento inner join cargo on cargo.codCargo = funcionario.codCargo where funcionario.funcional = :funcional" );            
            $consulta->bindParam(':funcional', $funcional);
            $consulta->execute();
            return $consulta->fetch(PDO::FETCH_ASSOC);
        }

        public function excluirFuncionario($funcional) {
            $excluir = $this->PDO->prepare("delete from funcionario where funcional = :funcional");
            $excluir->bindParam(':funcional', $funcional);
            $excluir->execute();
        }

        public function pesquisarFuncionario($data) {
            $pesquisar = $this->PDO->prepare("select funcionario.funcional, funcionario.nome, funcionario.cpf, funcionario.endereco, funcionario.telefone, funcionario.img, funcionario.created_at, funcionario.acesso, departamento.nomeDepartamento, cargo.nomeCargo from departamento inner join funcionario on departamento.codDepartamento = funcionario.codDepartamento inner join cargo on cargo.codCargo = funcionario.codCargo where funcional like :data or nome like :data");
            $data = '%' . $data . '%'; 
            $pesquisar->bindParam(':data', $data);
            $pesquisar->execute();
            return $pesquisar->fetchAll(PDO::FETCH_ASSOC); 
        }
        
    }
?>
