<?php
$query="SELECT felhasznalonev, email, jog FROM felhasznalok ORDER BY felhasznalonev";
require_once DATABASE_CONTROLLER;
$users=getList($query);
?>

<?php if(count($users)<=0) : ?>
<p>Nincs felhasználó regisztrálva!</p>
<?php else : ?>
<table class="table table-striped table-blue lista" style="padding-top: 25px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Felhasználónév</th>
      <th scope="col">Email</th>
      <th scope="col">Jogkör</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=0;?>
    <?php foreach($users as $u) : ?>
        <?php $i++; ?>
    <tr>
      <th scope="row"><?=$i ?></th>
      <td><?=$u['felhasznalonev']?></td>
      <td><?=$u['email']?></td>
      <td><?=$u['jog']?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <?php endif; ?>