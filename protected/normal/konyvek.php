
 

<ul class="nav nav-tabs">

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Szűrés</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="index.php?P=konyvek&szures=novella" name="novella">Novella</a>
      <a class="dropdown-item" href="index.php?P=konyvek&szures=regeny" name="regeny">Regény</a>
      <a class="dropdown-item" href="index.php?P=konyvek&szures=nincsszures" name="nincsszures">Összes</a>
    </div>
  </li>
  <div class="konyv"> 
</ul>
</form>
<?php
if(isset($_GET['szures']))
{
    switch ($_GET['szures']) {
        case 'novella':
        $query="SELECT cim, mufaj,link, id FROM konyvek WHERE mufaj='Novella' ORDER BY cim";
            break;
        case 'regeny':
            $query="SELECT cim, mufaj,link, id FROM konyvek WHERE mufaj='Regény' ORDER BY cim";
            break;
        case 'nincsszures':
          $query="SELECT cim, mufaj,link, id FROM konyvek ORDER BY cim";
              break;
        default:
            $query="SELECT cim, mufaj,link, id FROM konyvek ORDER BY cim";
            break;
}
}
else
{
    $query="SELECT cim, mufaj,link, id FROM konyvek ORDER BY cim";
}
require_once DATABASE_CONTROLLER;
$books=getList($query);
?>

<?php if(count($books)<=0) : ?>
Az adatbázis üres! Kérjen meg egy admint, hogy töltse fel könyvekkel az adatbázist vagy ajánljon könyveket az adminisztrátorunknak! :)
<?php else : ?>

    <div class="d-flex flex-row flex-wrap justify-content-center">
<?php foreach($books as $b) : ?>

<div class="card m-4" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?=$b['cim']?></h5>
    <h6 class="card-subtitle mb-2 text-muted">E-könyv</h6>
    <p class="card-text">Mufaj: <?=$b['mufaj']?></p>
    <a href="<?=$b['link']?>" target="_blank" class="card-link">Olvasni szeretném!</a>
  </div>
</div>

    <?php endforeach; ?>
    </div>
    <?php endif; ?>

</div>


