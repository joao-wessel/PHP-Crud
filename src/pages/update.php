<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Formulário de Consumo de Energia</title>
</head>

<style>
  @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap');

  .header-container {
    background-color: #212529;
    color: white;
    font-family: 'Montserrat', sans-serif;
    font-size: 40px;
    display: flex;

    padding-top: 20px;
    padding-bottom: 20px;
    margin-bottom: 20px;
  }

  .title {
    margin-left: 10px;
  }

  .form-area {
    margin: auto;
    margin-top: 4 0px;
    width: 1800px;
  }
</style>

<?php
require "../models/dao.php";
$dao = new clientDAO();
$result = $dao->search($_GET['id']);
?>

<body>
  <div class="header-container">
    <header class="title">
      Cadastro
    </header>
  </div>

  <div class="form-area">
    <form class="row g-3" action="../actions/update.php" method="post">
      <div class="col-md-4">
        <label for="input-name" class="form-label">Nome</label>
        <input type="text" name="nome" value="<?= $result['nome'] ?>" class="form-control" id="input-name" required>
      </div>

      <div class="col-md-4">
        <label for="input-cpf" class="form-label">CPF</label>
        <input type="text" name="cpf" value="<?= $result['cpf'] ?>" class="form-control" id="input-cpf" required>
      </div>

      <div class="col-4">
        <label for="input-nascimento" class="form-label">Data de Nascimento</label>
        <input type="date" name="nascimento" value="<?= $result['nascimento'] ?>" class="form-control" id="input-nascimento" required>
      </div>

      <div class="col-6">
        <label for="input-endereco" class="form-label">Endereço</label>
        <input type="text" name="endereco" value="<?= $result['endereco'] ?>" class="form-control" id="input-endereco" required>
      </div>

      <div class="col-md-6">
        <label for="input-bairro" class="form-label">Bairro</label>
        <input type="text" name="bairro" value="<?= $result['bairro'] ?>" class="form-control" id="input-bairro" required>
      </div>

      <div class="col-md-6">
        <label for="input-cep" class="form-label">CEP</label>
        <input type="text" name="cep" value="<?= $result['cep'] ?>" class="form-control" id="input-cep" required>
      </div>

      <div class="col-md-6">
        <label for="input-uc" class="form-label">UC</label>
        <input type="number" name="unidade_consumidora" value="<?= $result['unidade_consumidora'] ?>" class="form-control" id="input-uc" required>
      </div>

      <div class="col-md-4">
        <label for="input-vencimento" class="form-label">Vencimento</label>
        <input type="date" name="data_vencimento" value="<?= $result['data_vencimento'] ?>" class="form-control" id="input-vencimento" required>
      </div>

      <div class="col-md-8">
        <label for="input-consumo" class="form-label">Consumo Kw/h</label>
        <input type="number" name="kwh" value="<?= $result['kwh'] ?>" class="form-control" id="input-consumo" required>
      </div>

      <div class="col-md-12">
        <label for="input-total" class="form-label">Total</label>
        <input type="number" name="valor_total" value="<?= $result['valor_total'] ?>" class="form-control" id="input-total" required>
      </div>

      <div class="col-10">
        <label for="input-sexo" class="form-label">Sexo</label>
        <div class="form-radio">
          <input class="form-radio-input" name="sexo" value="<?= $result['sexo'] ?>" type="radio" id="input-masculino" required>
          <label class="form-radio-label" for="input-masculino">
            Masculino
          </label>
        </div>

        <div class="form-radio">
          <input class="form-radio-input" name="sexo" value="<?= $result['sexo'] ?>" type="radio" id="input-feminino" required>
          <label class="form-radio-label" for="input-feminino">
            Feminino
          </label>
        </div>
      </div>

      <div class="col-12">
        <button type="submit" value="Submit" class="btn btn-dark">Update</button>
      </div>

      <input type="hidden" value="<?= $result['id'] ?>" name="id">
    </form>
  </div>

</body>

</html>