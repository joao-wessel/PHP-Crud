<?php
$_DIR = $_SERVER['DOCUMENT_ROOT'];
require_once "$_DIR/CRUD - CE/src/connection.php";
require_once "$_DIR/CRUD - CE/src/entities/client.php";

class clientDAO
{
    public function read()
    {
        global $pdo;
        $sql = $pdo->query("SELECT * FROM cliente");
        if ($sql->rowCount() > 0) {
            $clientsList = array();
            $allClients = $sql->fetchAll();
        }

        foreach ($allClients as $clientsDb) {
            $client = new Client();
            $client->nome = $clientsDb['nome'];
            $client->cpf = $clientsDb['cpf'];
            $client->nascimento = $clientsDb['nascimento'];
            $client->endereco = $clientsDb['endereco'];
            $client->bairro = $clientsDb['bairro'];
            $client->cep = $clientsDb['cep'];
            $client->sexo = $clientsDb['sexo'];
            $client->data_vencimento = $clientsDb['data_vencimento'];
            $client->unidade_consumidora = $clientsDb['unidade_consumidora'];
            $client->kwh = $clientsDb['kwh'];
            $client->valor_total = $clientsDb['valor_total'];
            $client->id = $clientsDb['id'];
            $clientsList[] = $client;
        }
        return $clientsList;
    }

    public function create(Client $client)
    {
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO cliente (nome, cpf, nascimento, endereco, bairro, cep, sexo, data_vencimento, unidade_consumidora, kwh, valor_total) VALUES (:nome,:cpf,:nascimento,:endereco,:bairro,:cep,:sexo,:data_vencimento,:unidade_consumidora,:kwh,:valor_total)");
        $sql->bindValue(':nome', $client->nome);
        $sql->bindValue(':cpf', $client->cpf);
        $sql->bindValue(':nascimento', $client->nascimento);
        $sql->bindValue(':endereco', $client->endereco);
        $sql->bindValue(':bairro', $client->bairro);
        $sql->bindValue(':cep', $client->cep);
        $sql->bindValue(':sexo', $client->sexo);
        $sql->bindValue(':data_vencimento', $client->data_vencimento);
        $sql->bindValue(':unidade_consumidora', $client->unidade_consumidora);
        $sql->bindValue(':kwh', $client->kwh);
        $sql->bindValue(':valor_total', $client->valor_total);
        $sql->execute();
    }

    public function delete($id)
    {
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM cliente WHERE id=:id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    public function update($client)
    {
        global $pdo;
        $sql = $pdo->prepare("UPDATE cliente SET nome = :nome, cpf = :cpf, nascimento = :nascimento, endereco = :endereco, bairro = :bairro, cep = :cep, sexo = :sexo, data_vencimento = :data_vencimento, unidade_consumidora = :unidade_consumidora, kwh = :kwh, valor_total = :valor_total WHERE id=:id");
        $sql->bindValue(':id', $client->id);
        $sql->bindValue(':nome', $client->nome);
        $sql->bindValue(':cpf', $client->cpf);
        $sql->bindValue(':nascimento', $client->nascimento);
        $sql->bindValue(':endereco', $client->endereco);
        $sql->bindValue(':bairro', $client->bairro);
        $sql->bindValue(':cep', $client->cep);
        $sql->bindValue(':sexo', $client->sexo);
        $sql->bindValue(':data_vencimento', $client->data_vencimento);
        $sql->bindValue(':unidade_consumidora', $client->unidade_consumidora);
        $sql->bindValue(':kwh', $client->kwh);
        $sql->bindValue(':valor_total', $client->valor_total);
        $sql->execute();
    }

    public function search($id)
    {
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM cliente WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $client = $sql->fetch(PDO::FETCH_ASSOC);
            return $client;
        } else {
            return false;
        }
    }
}