<?php
require_once PROTECTED_DIR.'normal/konyvtorles.php';
?>
<?php

$query="SELECT cim, mufaj, id FROM konyvek ORDER BY cim";
require_once DATABASE_CONTROLLER;
$books=getList($query);
?>

<?php if(count($books)<=0) : ?>
  <div class="alert alert-warning" role="alert" style="text-algin:justify; width:50%; margin:0 auto;">
  Nincs könyv az adatbázisban! Vegyen fel <a class="alert-link" href="index.php?P=addkonyv">könyveket</a> az adatbázisba!
</div>

<?php else : ?>
<table class="table table-striped table-blue lista" style="padding-top: 25px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cím</th>
      <th scope="col">Műfaj</th>
      <th scope="col">Törlés</th>
      <th scope="col">Módosítás</th>
      <th scope="col"><a href="index.php?P=addkonyv">Könyv felvétele</th>
    </tr>
  </thead>
  <tbody>
  <?php $i=0;?>
    <?php foreach($books as $b) : ?>
        <?php $i++; ?>
    <tr>
      <th scope="row"><?=$i ?></th>
      <td><?=$b['cim']?></td>
      <td><?=$b['mufaj']?></td>
      <td><a href="<?='?P=konyvlista&torles='.$b['id']?>">Törlés</td>
      <td><a href="<?='?P=konyvmodosit&id='.$b['id']?>">Módosít</td>
      <td><td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <?php endif; ?>