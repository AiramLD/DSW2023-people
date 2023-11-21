<?php

namespace Airam\People\Controllers;

use Airam\People\Models\Person;

class PersonController {

  public function list() {
    $persons = Person::all();
    require('../src/views/person/list.php');
  }

  public function show($id) {
    $person = Person::find($id);

    if($person) {
      require('../src/views/person/show.php');
    }else{
      $this->list();
    }
}
  public function delete($id) {
    $person = Person::find($id);
    if($person) {
      $person->delete();
    }
    $this->list();
  }

  public function create(){
    require('../src/views/person/create.php');
  }
  public function post($data){
    $person = new Person();
    $person->name = $data['name'];
    $person->save();
    $this->list();
  }
}

