<?php
class Conexao
{
    public static $conexao;
    public static function conectar()
    {
        try {
            $conexao = new PDO("mysql:dbname=empresa0702;host=localhost", "root", "");
            return $conexao;
        } catch (PDOException $e) {
            echo "Erro com Banco de Dados" . $e->getMessage();
        } catch (Exception $e) {
            echo "Erro Generico" . $e->getMessage();
        }
    }
}
?>