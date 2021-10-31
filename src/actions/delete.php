<?php
$_DIR = $_SERVER['DOCUMENT_ROOT'];
require_once "$_DIR/CRUD - CE/src/connection.php";
require_once "$_DIR/CRUD - CE/src/models/dao.php";

$id = filter_input(INPUT_GET, "id");

if ($id) {
  $dao = new clientDAO();
  $dao->delete($id);
}

header('Location:../../index.php');