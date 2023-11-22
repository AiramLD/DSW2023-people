<?php

namespace Airam\People\Controllers;

use Airam\People\Models\Person;

class PersonController
{

  private $messages = [];



  public function list()
  {
    $persons = Person::all();
    require('../src/views/templates/head.php');
    require('../src/views/person/list.php');
    require('../src/views/templates/foot.php');
  }

  public function show($id)
  {
    $person = Person::find($id);

    if ($person) {
      require('../src/views/templates/head.php');
      require('../src/views/person/show.php');
      require('../src/views/templates/foot.php');
    } else {
      $this->messages[] = [
        'type' => 'error',
        'text' => 'La persona no existe'
      ];
      $this->list();
    }
  }
  public function delete($id)
  {
    $person = Person::find($id);
    if ($person) {
      $this->messages[] = [
        'type' => 'success',
        'text' => 'La persona fue eliminada'
      ];
      $person->delete();
    } else {
      $this->messages[] = [
        'type' => 'error',
        'text' => 'La persona no existe o fue borrada'
      ];
    }
    $this->list();
  }

  public function create()
  {
    require('../src/views/templates/head.php');
    require('../src/views/person/create.php');
    require('../src/views/templates/foot.php');
  }
  public function post($data)
  {
    $person = new Person();
    $person->name = $data['name'];
    $person->save();
    $this->list();
    //header('Location','localhost/DSW2023-people/public/index.php');
  }
  public function edit($id)
  {
    $person = Person::find($id);
    if ($person) {
      require('../src/views/templates/head.php');
      require('../src/views/person/edit.php');
      require('../src/views/templates/foot.php');
    } else {
      $this->messages[] = [
        'type' => 'error',
        'text' => 'La persona no existe o no fure encontrada'
      ];
    }
  }

  public function update($id, $data) {
    $person = Person::find($id);
    if ($person) {
      if (!empty($data['name'])) {
        $person->name = $data['name'];
        $person->save();
        $this->messages[] = [
          'type' => 'success',
          'text' => 'El usuario se updateo correctamente'
        ];
        $this->list();
      } else {
        $this->messages[] = [
          'type' => 'error',
          'text' => 'El nombre no puede estar vacio'
        ];
        $this->edit($id);
      }
    }else {
      $this->messages[] = [
        'type' => 'error',
        'text' => "La persona no existe la persona con el id=$id"
      ];
      $this->list();
    }
  }
}
