<?php
$_DIR = $_SERVER['DOCUMENT_ROOT'];
require_once "$_DIR/CRUD - CE/src/connection.php";
require_once "$_DIR/CRUD - CE/src/models/dao.php";

if (isset($_POST['nome'])) {
  $cliente = new Client();
  $dao = new ClientDao($pdo);
  $cliente->id = $_POST['id'];
  $cliente->nome = $_POST['nome'];
  $cliente->cpf = $_POST['cpf'];
  $cliente->nascimento = $_POST['nascimento'];
  $cliente->endereco = $_POST['endereco'];
  $cliente->bairro = $_POST['bairro'];
  $cliente->cep = $_POST['cep'];
  $cliente->sexo = $_POST['sexo'];
  $cliente->unidade_consumidora = $_POST['unidade_consumidora'];
  $cliente->data_vencimento = $_POST['data_vencimento'];
  $cliente->kwh = $_POST['kwh'];
  $cliente->valor_total = $_POST['valor_total'];
  $dao->update($cliente);
}

header('Location:../../index.php');