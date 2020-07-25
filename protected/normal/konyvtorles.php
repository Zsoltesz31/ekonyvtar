<?php
if(isset($_GET['torles']))
{
$params = [':id' =>$_GET['torles']]; 
$query = "DELETE FROM konyvek WHERE id=:id"; 
require_once DATABASE_CONTROLLER;
if(!executeDML($query,$params))
{
    echo"Sikertelen törlés!";
}
}
?>