<?php
require '../vendor/autoload.php';
require '../src/utils/connection.php';

use Airam\People\Controllers\PersonController;

  $table = isset($_GET['table']) ? $_GET['table'] : 'person';
  $action = isset($_GET['action']) ? $_GET['action'] : 'list';
  $id = isset($_GET['id']) ? $_GET['id'] : null;

  $controller = null;
  switch ($table) {
    case 'person':
      $controller = new PersonController();
      break;
  }

  switch ($action) {
    case "list":
      $controller->list();
      break;
    case "show":
      $controller->show($id);
      break;
    case "delete":
      $controller->delete($id);
      break;
    case "create":
      $controller->create();
      break;
    case "post":
      $controller->post($_POST);
      break;
    case "edit":
      $controller->edit($id);
      break;
    case "update":
      $controller->update($id, $_POST);
      break;
  }
  ?>
