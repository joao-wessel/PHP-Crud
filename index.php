<?php
require "./src/models/dao.php";

$clientDao = new clientDAO($pdo);

$clientList = $clientDao->read();
?>

<?php require "./src/partials/header.php" ?>

<div class="m-auto" style="width: 1800px;">
  <a href="./src/pages/insert.php"><button type="button" class="btn btn-secondary btn-dark">Cadastrar Cliente</button></a>
  <div class="d-flex m-auto" style="width: 1800px;">
    <table class="table table-bordered table-hover" style="margin-top: 10px;">
      <thead class="thead-dark">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Data de Nascimento</th>
          <th>Endereço</th>
          <th>Bairro</th>
          <th>CEP</th>
          <th>Sexo</th>
          <th>Vencimento</th>
          <th>UC</th>
          <th>Consumo Kw/h</th>
          <th>Valor</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($clientList as $client) : ?>
          <tr>
            <td><?= $client->id; ?></td>
            <td><?= $client->nome; ?></td>
            <td><?= $client->cpf; ?></td>
            <td><?= $client->nascimento; ?></td>
            <td><?= $client->endereco; ?></td>
            <td><?= $client->bairro; ?></td>
            <td><?= $client->cep; ?></td>
            <td><?= $client->sexo; ?></td>
            <td><?= $client->data_vencimento; ?></td>
            <td><?= $client->unidade_consumidora; ?></td>
            <td><?= $client->kwh; ?></td>
            <td><?= "R$ " . $client->valor_total; ?></td>
            <td><a href="./src/pages/update.php?id=<?= $client->id; ?>"><button type="button" class="btn btn-dark">Editar</button></a>
              <a href="./src/actions/delete.php?id=<?= $client->id; ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>