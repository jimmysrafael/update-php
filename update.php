<?php

require_once '../../../conexao_bd/db/ConMysqlPdo.php'; //Importando conexão do banco de dados
require_once '../../../Linha/model/Linha.php'; //Importando classe

class Classe {

    public static function update(Linha $Linha) {

        try {
            $pdo = ConMysqlPdo::getInstance();

            $sql = "UPDATE  linha
                    SET DESCRICAO =:DESCRICAO,
                    WHERE ID = :ID";

            $stmt = $pdo->prepare($sql);
            date_default_timezone_set('America/Manaus');
            $date = date('Y-m-d H:i:s');
            $stmt->bindValue(":ID", $Linha->get_id());
            $stmt->bindValue(":DESCRICAO", $Linha->get_descricao());
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return $stmt->rowCount();
            } else {
                return false;
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

}