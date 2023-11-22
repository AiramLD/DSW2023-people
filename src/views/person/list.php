<h1>Gentes</h1>
<p>
  <a href="index.php?action=create">Crear</a>
</p>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
<?php
  foreach($persons as $person) {
    ?>
 
      <tr>
        <td><?=$person->id?></td>
        <td>
      <a href="index.php?action=show&id=<?=$person->id?>">
          <?=$person->name?>
          </a>
        </td>
        <td>
          <a href="index.php?action=edit&id=<?=$person->id?>">
          &#128393;
          </a>
        </td>
        <td>
          <a href="index.php?action=delete&id=<?=$person->id?>">
          &#128465;
          </a>
        </td>
        
      </tr>
      <?php
  }
  ?>
    </tbody>
  </table>