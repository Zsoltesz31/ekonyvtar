
<?php
$query="SELECT vnev, knev,szarmazas, link, id FROM writers ORDER BY vnev";
require_once DATABASE_CONTROLLER;
$writers=getList($query);
?>

<?php if(count($writers)<=0) : ?>
  <div class="alert alert-warning" role="alert" style="text-algin:justify; width:50%; margin:0 auto;">
  Nincs író/szerző az adatbázisban! Vegyen fel <a class="alert-link" href="index.php?P=addiro">írókat/szerzőket</a> az adatbázisba!
</div>

<?php else : ?>
<table class="table table-striped table-blue lista" style="padding-top: 25px;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Vezetéknév</th>
      <th scope="col">Keresztnév</th>
      <th scope="col">Származás</th>
      <th scope="col">Wikipedia</th>
      <?php if(isset($_SESSION['jog']) && $_SESSION['jog'] == 1) : ?>
      <th scope="col">Törlés</th>
      <?php endif; ?>
      <?php if(isset($_SESSION['jog']) && $_SESSION['jog'] == 1) : ?>
      <th scope="col"><a href="index.php?P=addiro">Író felvétele</th>
      <?php endif; ?>
    </tr>
  </thead>
  <tbody>
  <?php $i=0;?>
    <?php foreach($writers as $w) : ?>
        <?php $i++; ?>
    <tr>
      <th scope="row"><?=$i ?></th>
      <td><?=$w['vnev']?></td>
      <td><?=$w['knev']?></td>
      <td><?=$w['szarmazas']?></td>
      <td><a href="<?=$w['link']?>" target="_blank">Háttér történet</td>
      <?php if(isset($_SESSION['jog']) && $_SESSION['jog'] == 1) : ?>
      <td><a href="<?='?P=irok&torles='.$b['id']?>">Törlés</td>ű
      <?php endif; ?>
      <td></td>

      <td><td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <?php endif; ?>